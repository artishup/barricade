<?php

namespace ArtishUp\Shared\Presentation\Http\Middleware;

use Closure;
use Aws\Sns\Message;
use Aws\Sns\MessageValidator;
use Aws\Sns\Exception\InvalidSnsMessageException;

class AwsSnsMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            $message = Message::fromRawPostData();

            if (getenv('APP_ENV') == 'production') {
                $validator = new MessageValidator();

                try {
                    $validator->validate($message);
                } catch (InvalidSnsMessageException $e) {
                    return response('SNS Message Validation Error: ' . $e->getMessage(), 404);
                }
            }

            if (isset($message['Type']) && $message['Type'] === 'SubscriptionConfirmation') {
                file_get_contents($message['SubscribeURL']);

                return response('Subscription Confirmed', 200);
            }

            if (isset($message['Type']) && $message['Type'] === 'Notification') {
                $request->request->add([
                    'subject' => $message['Subject'],
                    'message' => json_decode($message['Message'], true),
                ]);
            }
        } catch (\Exception $e) {
            //
        }

        return $next($request);
    }
}
