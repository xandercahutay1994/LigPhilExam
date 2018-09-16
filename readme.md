<-- Log-in Credentials -->

<p> URL => http://ligphilexamherokuapp.herokuapp.com/public/index.php/login </p>
<p> ID => 1 </p>
<p> Password => adminJim </p>

<p> REGISTER PAGE </p>
<p> URL => http://ligphilexamherokuapp.herokuapp.com/public/index.php/register </p>
<-- If no admin has been registered but this page allows only 1 admin to be registered.
 You only have to fill in the password input because it only creates 1 admin and I used auto-increments so the ID # you
 will be using when you want to login is "1".
 Note: you can't edit your account in this page because this is intended only for registration of 1 admin.
-->

<p> 
    After successfully logging in, you will be redirected to this page http://ligphilexamherokuapp.herokuapp.com/public/index.php/index. 
</p>
<p>
    This page lists all the articles posted with images and it shows only the latest 5 articles. Scroll down and you will see a "MORE" button, try clicking it and it will go to http://ligphilexamherokuapp.herokuapp.com/public/index.php/archive. The archive page lists all the articles posted sort by date and maximum of 5 articles per page, you can access the rest of articles through pagination at the bottom of the page. 
</p>
<p> You can click the images either in index or archive pages and it will navigate you to the single page. Single page shows the specific article you click and it shows the title and content details. Here is an example  http://ligphilexamherokuapp.herokuapp.com/public/index.php/single/12 </p>

<p> To navigate back to index page simply click the BLOG LOGO. </p>

<p> If you want to post or save new article, just go to http://ligphilexamherokuapp.herokuapp.com/public/index.php/adminPosts. Just take note that you have to fill in all input fields for it to be successfully posted. When you see "ERROR" above the submit button it means that you forgot to fill all inputs(including image). If successfully save, there is an "ARTICLE POSTED" word above the submit button that clarifies the successful transaction. </p>

<p> In "adminPost" you will see a "BACK" button, try to clicked it and you will be redirected to "adminList" http://ligphilexamherokuapp.herokuapp.com/public/index.php/adminLists . AdminLists page displays all articles that has been posted without an image and limit per page, it basically shows all the data posted in database sorted by date. </p>


