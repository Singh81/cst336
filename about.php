<!DOCTYPE html>
<html>
<!--

First Website
and comment
in html
(comments can span multiple lines)

-->

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        
       
        
        <meta charset="utf-8" />
        <title> Ravinder Singh: Personal Website</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body>
        <header>
            <h1>
                Ravinder Singh
            </h1>
        </header>
        <nav>
            <hr width="50%" />
            <a href="index.php"> <strong>Home</strong></a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </nav>
        
        <br/>
        <br/>
         
         <div id="content">
             <table>
                 <tr id="table-header">
                     <td><strong>Programming Language</strong></td>
                     <td><strong>Years Experience</strong></td>
                 </tr>
                 <tr class="table-row">
                     <td>Java</td>
                     <td>Beginner</td>
                 </tr>
                 <tr class="table-row">
                     <td>C++</td>
                     <td>1</td>
                 </tr>
                 <tr class="table-row">
                     <td>PHP</td>
                     <td>Beginner</td>
                 </tr>
                 <tr  class="table-row">
                     <td>Sqlite</td>
                     <td>1</td>
                 </tr>
             </table>
            <ul>
                <li><span class="hobby">Video games</span> : I own a gaming desktop and I usually play battlefield or call of duty.</li>
                <li> <span class="hobby">Sports</span>: I love bodybuilding. I like to workout 5 to 6 days a week for couple hours a day</li>
                <li> <span class="hobby">Music</span>: I love all kind of music. I play agressive rap or techno while working out and lsiten to hindi songs while driving or studying</li>
                <li><span class="hobby" >Programming</span>: I love programming. I liek to spend couple hours a day on my school assignments.</li>
            </ul>
         </div>
        
        
        <!-- This is the footer -->
        <!-- The footer goes inside the body but not always -->
        <footer>
           <?php

include_once('footer.php');

?>
        </footer>
        <!-- closing footer -->
        
    </body>
    <!-- closing body -->

</html>