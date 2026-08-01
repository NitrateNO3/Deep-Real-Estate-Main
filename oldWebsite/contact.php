   <?php
session_start();
$_SESSION = array();

include("captcha/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

?> <tr><td width="100%"><img src="images/photo3.jpg" alt="deeprealestate.in" height="294" width="759" /></td>
  </tr>
    <tr height="5"><td></td></tr>

  	<tr><td><table width="759"  border="2" cellpadding="8"  bordercolor="#666666"><tr>
  		<td width="450" valign="top">
  		  <p  style="font-size:14px; color:#996600;">Your communication is VERY IMPORTANT to us. 
Please type your comment below. You will receive an acknowledgment of your request and a prompt reply.
  </p>
<? if (isset($_GET['msg'])) { $msg=$_GET['msg'];echo "<script>alert('$msg')</script>"; } ?>
  <style type="text/css">
        pre {
            border: solid 1px #bbb;
            padding: 10px;
            margin: 2em;
        }

        img {
            border: solid 1px #ccc;
            margin: 0 2em;
        }
    </style>
<table cellpadding="8" cellspacing="0" border="0" width="440">
   
    <tr><td style="height:10px"></td></tr>
    <tr>
      <td colspan="2" style="text-align:justify; line-height:15px;" class="body">
       
      <form name="form" method="POST" action="attachment_email_form.php" >
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
          <tr>
            <td width="23%" class="body"> Name</td>
            <td width="3%" class="body">:</td>
            <td width="74%"><input type="text" name="strname" class="textfield"></td>
        </tr>
        <tr><td style="height:3px"></td></tr>
        
        
        <tr>
            <td width="23%" class="body"> Contact No</td>
            <td width="3%" class="body">:</td>
            <td width="74%"><input type="text" name="strno" class="textfield"></td>
        </tr>
        <tr><td style="height:3px"></td></tr>
        <tr>
            <td width="23%" class="body"> Email</td>
            <td width="3%" class="body">:</td>
            <td width="74%"><input type="text" name="stremail" id="stremail" class="textfield"></td>
        </tr>
        <tr><td style="height:3px"></td></tr>
        <tr>
            <td width="23%" class="body"> Comments</td>
            <td width="3%" class="body">:</td>
            <td width="74%"><textarea cols="16" name="strcomments"></textarea></td>
        </tr>
        <tr><td style="height:3px"></td></tr>
        <tr>
            <td width="23%" class="body"> <?php
        echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';

        ?></td>
            <td width="3%" class="body">:</td>
            <td width="74%"><input type='text' cols="16" name="captchatext" ></td>
        </tr>
        <tr><td style="height:10px"> </td></tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="Send" name="submit" > <input type="reset" value="Reset" name="reset">
            </td>
        </tr>
       
      </table>   
     </form>
     
</td>
    </tr>
    <tr>
      <td colspan="2" align="center"> </td>
  </tr>
    </table>

	           </td>
                    <td width="309" align="left" valign="top" style="color:#996600; font-size:14px;" ><a href="contactmapbig.gif"><img src="contactmap.gif" alt="contact_map" width="150" height="100" /></a> 
           <div style="margin-left:10px;">    <p>or Write/Meet us at:</p>     
           <img src="images/deeps.png" alt="logo" height="60" width="110"/>

<p><span style="font-size:14px";>G-564, Sushant Lok-II Extn.,<br />
Near Scottish High International School,<br />
Sector-57, Gurgaon<br />
Haryana-122011<br />
</span></p>

<p>
Phone: <strong>+91 124 4080100</strong><br />
Email:<strong>&nbsp;info@deeprealestate.in</strong><br />
</p><p>
Mobile.: <br />
<span style="font-size:14px";><strong>Pawan Kumar <br />
+91 9810922338<br />+91 9810933338</strong></span><br /></p></div>
                    
                                        </td>
                
                
                </tr>
             </table>        </td>
      </tr>