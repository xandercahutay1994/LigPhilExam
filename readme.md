<p> <b> REGISTER PAGE </b> </p>
<p> URL => http://ligphilexamherokuapp.herokuapp.com/public/index.php/register </p>
<p> This page allows only 1 admin to be registered. If no admin has been registered, you only have to fill in the password input. Because it restrict only to create 1 admin, so the ID # you will be using when you want to login is "1". I used auto-increment in the database. <p>
<p>
 Note: you can't edit/delete your account in this page because this is intended only for registration of 1 admin. If you already have an account just skip this and go to Log-In page.
</p>

<p> <b> LOG-IN CREDENTIALS </b> </p>

<p> URL => http://ligphilexamherokuapp.herokuapp.com/public/index.php/login </p>
<p> ID => 1 </p>
<p> Password => adminJim </p>

<p> 
    After successfully logging in, you will be redirected to this page http://ligphilexamherokuapp.herokuapp.com/public/index.php/index. 
</p>

<p> <b> INDEX PAGE, ARCHIVE PAGE </b> </p>

<p>
    This page lists all the articles posted with images and it shows only the latest 5 articles. Scroll down and you will see a "MORE" button, try clicking it and it will go to http://ligphilexamherokuapp.herokuapp.com/public/index.php/archive. The archive page lists all the articles posted sort by date and maximum of 5 articles per page, you can access the rest of articles through pagination at the bottom of the page. 
</p>

<p> <b> SINGLE PAGE </b> </p>
<p> You can click the images either in index or archive pages and it will navigate you to the single page. Single page shows the specific article you click and it shows the title and content details. Here is an example  http://ligphilexamherokuapp.herokuapp.com/public/index.php/single/5 </p>

<p> To navigate back to index page simply click the BLOG LOGO or "TOP" button. </p>

<p> <b> ADMINPOST PAGE </b> </p>

<p> If you want to post or save new article, just go to http://ligphilexamherokuapp.herokuapp.com/public/index.php/adminPosts. Just take note that you have to fill in all input fields for it to be successfully posted. When you see "ERROR" above the submit button it means that you forgot to fill all the inputs(including image). If successfully save, there is an "ARTICLE POSTED" word above the submit button that clarifies the successful transaction. </p>

<p> <b> ADMINLIST PAGE </b> </p>

<p> In "adminPost" you will see a "BACK" button, try to clicked it and you will be redirected to "adminList" http://ligphilexamherokuapp.herokuapp.com/public/index.php/adminLists . AdminLists page displays all articles without images that have been posted without an image and limit per page, it basically shows all the data posted in database sorted by date. </p> <p> "New Article" button will let you go to "/adminPosts" page which is you can add/save new article.<p>

<p> Note: In "/adminLists" page, the articles that are displayed there are linked to "/adminPosts" page where you can edit the existing article that you clicked. </p>

<p> <b> LIST of URL's </b> </p>
<p> <b> "ligphilexamherokuapp.herokuapp.com/public/index.php/" </b> </p>

<p> <b> /register </b> </p>
<p> <b> /login </b> </p>
<p> <b> /index </b> </p>
<p> <b> /archive </b> </p>
<p> <b> /single/{id} </b> </p>
<p> <b> /adminPosts </b> </p>
<p> <b> /adminLists </b> </p>


<p> Hopefully you understand my details, thank you so much! </p>


