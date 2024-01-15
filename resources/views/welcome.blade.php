<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentalFLO</title>

    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col">
        <div id="nav-bar" class="fixed top-0 h-16 w-full grid grid-cols-[1fr,1fr] bg-white">
            <!-- Home Page Nav bar -->
            <div class=" grid grid-cols-[1fr,1fr]">
                <div class=" flex items-center justify-center">
                    <a href=""><img src="images/logo.png" class='h-12' alt=""></a>
                </div>
                <div class="">

                </div>
            </div>
            <div class="grid grid-cols-[1fr,2fr,1.5fr]">
                <div>

                </div>
                <div>
                    <ul class=" flex items-center gap-8 h-16 justify-end">
                        <li>
                            <div class=" flex items-center justify-center text-purple-800 font-semibold hover:text-green-400"><a href="">Home</a></div>
                        </li>
                        <li>
                            <div class=" flex items-center justify-center text-purple-800 font-semibold hover:text-green-400"><a href="">Features</a></div>
                        </li>
                        <li>
                            <div class=" flex items-center justify-center text-purple-800 font-semibold hover:text-green-400"><a href="">FAQ</a></div>
                        </li>
                        <li>
                            <div class=" flex items-center justify-center text-purple-800 font-semibold hover:text-green-400"><a href="">Contact</a></div>
                        </li>
                        <li>
                            <div class=" flex items-center justify-center text-purple-800 font-semibold hover:text-green-400"><a href="">Login</a></div>
                        </li>
                        <li>
                            <div class=" flex items-center justify-center hover:text-green-400">
                                <button class="flex items-center justify-center text-white bg-purple-700 rounded-md pt-2 pb-2 pr-5 pl-5 w-32 hover:bg-green-500">
                                    Free Signup
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
                <div>

                </div>
            </div>
        </div>
        <div class="bg-green-500 flex flex-row mt-16 h-screen">
            <div class="bg-brown-400 grid grid-cols-[1fr,1fr] w-screen">
                <div>
                    <h4>Property Management System</h4>
                    <h1>Manage your Rental properties</h1>
                    <h3>Get free from hassle of managing your tenants and properties. Maintain your property data efficiently.</h3>
                    <button>Free Signup →</button>
                </div>
                <div class="bg-neutral-400 flex items-center justify-center">
                    <p class="text">image of some sort</p>
                </div>
            </div>

        </div>

</body>
</html>
