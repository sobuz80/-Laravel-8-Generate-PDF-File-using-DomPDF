Step 1: Install Laravel 8

I am going to explain step by step from scratch so, we need to get fresh Laravel 8 application using bellow command, So open your terminal OR command prompt and run bellow command:

composer create-project --prefer-dist laravel/laravel blog

Step 2: Install dompdf Package

first of all we will install barryvdh/laravel-dompdf composer package by following composer command in your laravel 8 application.

composer require barryvdh/laravel-dompdf

After successfully install package, open config/app.php file and add service provider and alias.

config/app.php

'providers' => [

	....

	Barryvdh\DomPDF\ServiceProvider::class,

],

  

'aliases' => [

	....

	'PDF' => Barryvdh\DomPDF\Facade::class,

]

Read Also: How to Generate PDF with Graph in Laravel?

Step 3: Add Route

In this is step we need to create routes for items listing. so open your "routes/web.php" file and add following route.

routes/web.php

<?php

  

use Illuminate\Support\Facades\Route;

  

use App\Http\Controllers\PDFController;

  

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/

  

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

Step 4: Add Controller

Here,we require to create new controller PDFController that will manage generatePDF method of route. So let's put bellow code.

app/Http/Controllers/PDFController.php

<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use PDF;

  

class PDFController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function generatePDF()

    {

        $data = [

            'title' => 'Welcome to ItSolutionStuff.com',

            'date' => date('m/d/Y')

        ];

          

        $pdf = PDF::loadView('myPDF', $data);

    

        return $pdf->download('itsolutionstuff.pdf');

    }

}

Step 5: Create View File

In Last step, let's create myPDF.blade.php(resources/views/myPDF.blade.php) for layout of pdf file and put following code:

resources/views/myPDF.blade.php

Read Also: Laravel 8 Auth with Inertia JS Jetstream Tutorial

<!DOCTYPE html>

<html>

<head>

    <title>Hi</title>

</head>

<body>

    <h1>{{ $title }}</h1>

    <p>{{ $date }}</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</body>

</html>
