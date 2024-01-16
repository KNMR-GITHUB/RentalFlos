<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentalFLO</title>

    @vite('resources/css/app.css')
</head>
<body class="min-h-screen grid grid-cols-[1fr,5fr,1fr]">
    <div id="left_div" class="">

    </div>
    <div id="central_div" class="container p-0 m-0 flex flex-col bg-blue-500 box-border">
        <div id="nav-bar" class="p-0 m-0 fixed top-0 h-16 flex w-full bg-white">
            <div>
                    <a href=""><img src="images/logo.png" alt="logo" class=" mt-2 h-12"></a>
            </div>
            <div class="">
                <ul class="flex mt-1 gap-4 items-center h-16">
                    <li>
                        <div class=" flex items-center justify-center text-purple-800 font-semibold hover:text-green-400"><a href="#home">Home</a></div>
                    </li>
                    <li>
                        <div class=" flex items-center justify-center text-purple-800 font-semibold hover:text-green-400"><a href="#features">Features</a></div>
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
        </div>
        <div id="home" class=" mt-16 grid grid-flow-col grid-cols-2">
            <div class=" mt-56 pl-4 pr-2 mb-80 pb-5">
                <h4 class="text-lg">Property Management System</h4> <br>
                    <h1 class="text-purple-800 text-6xl font-semibold">Manage your Rental properties</h1> <br>
                    <h3 class="text-2xl text-gray-500">Get free from hassle of managing your tenants and properties. Maintain your property data efficiently.</h3>
                    <br>
                    <button class="text-white text-xl rounded-md bg-purple-800 pt-2 pb-2 pr-10 pl-10">Free Signup →</button>
            </div>
            <div class="">
                <div class="mt-36 flex items-center justify-center">
                    <img src="images/landlord_tenant.png" alt="landlord_tenant.png">
                </div>
            </div>

        </div>
        <div id="features" class="grid grid-flow-row grid-rows-2 align-items-center bg-white">
            <div class=" gid grid-col pt-5">
                <p class="text-green-500 flex items-center justify-center">OUR AWESOME FEATURES</p>
                <h1 class="text-purple-800 text-4xl font-semibold flex pt-2 pb-4 items-center justify-center">Features for property owners</h1>
            <div class=" grid grid-rows-2 gap-2 pt-10">
                <div class=" grid grid-flow-col grid-cols-3">
                    <div class="flex flex-col items-center justify-items-center p-6 ml-3 mr-1.5 ">
                        <div class="h-32">
                            <img class ="h-26 mt-4 mb-4" src="images/easy_access.png" alt="">
                        </div>
                        <h1 class="text-purple-800 font-normal mt-4 text-2xl">Easy Access</h1>
                        <p class="text-lg text-gray-500 mt-4">Organize all your properties at one place for better management</p>
                    </div>
                    <div class="flex flex-col items-center justify-items-center p-6 ml-1.5 mr-1.5">
                        <div class="h-32">
                            <img class ="h-26 mt-4 mb-4" src="images/easy_tenant.png" alt="">
                        </div>
                        <h1 class="text-purple-800 mt-4 font-normal text-2xl">Easy Tenant Management</h1>
                        <p class="text-lg text-gray-500 mt-4">Manage all your tenats information at one place. Get easy access to tenant information.</p>
                    </div>
                    <div class="flex flex-col items-center justify-items-center p-6 ml-1.5 mr-3">
                        <div class="h-32">
                            <img class ="h-26 mt-4 mb-4" src="images/rent_management.png" alt="">
                        </div>
                        <h1 class="text-purple-800 mt-4 font-normal text-2xl">Rent Management</h1>
                        <p class="text-lg text-gray-500 mt-4">Organize your rents at one place. Easy to store the rent information for your property at one place.</p>
                    </div>
                </div>
                <div class=" grid grid-flow-col grid-cols-3">
                    <div class="flex flex-col items-center justify-items-center p-6 ml-3 mr-1.5">
                        <div class="h-32">
                            <img class ="h-26 mt-4 mb-4" src="images/expense_management.png" alt="">
                        </div>
                        <h1 class="text-purple-800 font-normal mt-4 text-2xl">Expense Management</h1>
                        <p class="text-lg text-gray-500 mt-4">Manage expenses at one place. Easy to add and edit expenses against your property at one place.</p>
                    </div>
                    <div class="flex flex-col items-center justify-items-center p-6 ml-1.5 mr-1.5">
                        <div class="h-32">
                            <img class ="h-26 mt-4 mb-4" src="images/files_management.png" alt="">
                        </div>
                        <h1 class="text-purple-800 font-normal mt-4 text-2xl">Files Management</h1>
                        <p class="text-lg text-gray-500 mt-4">Organize all your important documents related to your properties at oneplace. Easy upload and download options available.</p>
                    </div>
                    <div class="flex flex-col items-center justify-items-center p-6 ml-1.5 mr-3">
                        <div class="h-32">
                            <img class ="h-26 mt-4 mb-4" src="images/easy_to_use.png" alt="">
                        </div>
                        <h1 class="text-purple-800 mt-4 font-normal text-2xl">Easy to use</h1>
                        <p class="text-lg text-gray-500 mt-4">Our portal is very simple to use and yet very efficient.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="right_div" class="">

    </div>


</body>
</html>

