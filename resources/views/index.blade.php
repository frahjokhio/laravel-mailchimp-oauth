<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Mailchimp OAuth</title>
    <meta name="description" content="A demo of a payment on Stripe" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-white justify-center mt-10">
        <div class="py-8 px-4 mx-auto max-w-screen-md lg:py-16 lg:px-6">
            <div class="max-w-screen-lg text-gray-500 sm:text-lg dark:text-gray-600">

                <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-gray-700">Laravel Mailchimp OAuth Integration Boilerplate</h2>
                <p class="mb-4 font-medium">This Laravel boilerplate sets up OAuth integration with Mailchimp. To get started, click the "Connect to Mailchimp" button. If everything is configured correctly, you'll see the message: "Everything's Chimpy!" or something like that.</p>

                <div class="mt-12">

                    <a href="{{route('mailchimp.oauth.redirect')}}" class="inline-block	text-center mt-10 w-full text-gray-700 bg-yellow-500 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg px-5 py-5 me-2 mb-2 dark:bg-yellow-400 dark:hover:bg-yellow-500 focus:outline-none dark:focus:ring-yellow-800">
                        <span id="font-bold text-lg">Connect to Mailchimp</span>
                    </a>

                    <!-- show success messgae -->
                    @if(Session::has('success'))
                        <div class="mt-10 flex items-center p-4 mb-4 text-green-900 rounded-lg bg-green-50 dark:bg-green-100 dark:text-green-900" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>

</body>

</html>