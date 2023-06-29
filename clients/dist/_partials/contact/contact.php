<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./contact.css">
</head>
<body>
<div class="contact-section">
  <h1>Contact Us Page</h1>
    <p>
        You can reach to us in case of any questions and feedback.
        We shall be glad to hear from you.
    </p>
</div>
<div class="email">
    <p>
        Please send your inquiries to: <span><a style="text-decoration: none;" target="_blank" href="mailto:lovisambrose212@gmail.com">helpdesk@gmail.com</a></span>
    </p>
</div>


<div>
    <form id="emailForm" name="emailForm" method="post" action="#" >
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
            <tr>
                <td colspan="2"><strong>Fill out the form</strong></td>
            </tr>
            <tr>
                <td>Your E-mail :</td>
                <td><input name="email" type="text" id="email"></td>
            </tr>
            <tr>
                <td>Message :</td>
                <td>
                <textarea name="msg" cols="45" rows="5" id="msg"></textarea>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input name="SubmitBtn" type="submit" id="SubmitBtn" value="Submit"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>