<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$config[''] = ;//DESCRIPTION:  | DEFAULT:  | OPTIONS:

$config['useragent'] = "CodeIgniter";

$config['protocol'] = "smtp"; //OPTIONS: (mail, sendmail, or smtp) | DESCRIPTION:  The mail sending protocol.

$config['smtp_host'] = "mail.thumbsupngo.org " ;//DESCRIPTION: SMTP Server Address.

$config['smtp_user'] = "admin@thumbsupngo.org";//DESCRIPTION: SMTP Username.

$config['smtp_pass'] = "Thumbsup_212";//DESCRIPTION: SMTP Password.

$config['smtp_port'] = 465;//DESCRIPTION:  Port.

//$config['smtp_timeout'] = "";//DESCRIPTION: SMTP Timeout (in seconds). | DEFAULT: 5

//$config['mailpath'] = "";//DESCRIPTION: The server path to Sendmail. | DEFAULT: /usr/sbin/sendmail

//$config['smtp_keepalive'] = "";//DESCRIPTION: Enable persistent SMTP connections. DEFAULT: false |  OPTIONS: TRUE or FALSE (boolean)

$config['smtp_crypto'] = "ssl";//DESCRIPTION: SMTP Encryption |  DEFAULT:  |  OPTIONS: tls or ssl

//$config['wordwrap'] = "";//DESCRIPTION: Enable word-wrap. | DEFAULT: true | OPTIONS: TRUE or FALSE (boolean)

//$config['wrapchars'] = "";//DESCRIPTION:Character count to wrap at.  | DEFAULT:76  | OPTIONS: 

$config['mailtype'] = "html" ;//DESCRIPTION:Type of mail. If you send HTML email you must send it as a complete web page. Make sure you don’t have any relative links or relative image paths otherwise they will not work.  | DEFAULT:text  | OPTIONS: text or html

//$config['validate'] = "";//DESCRIPTION:Whether to validate the email address.  | DEFAULT:FALSE  | OPTIONS:TRUE or FALSE (boolean)

//$config['priority'] = "";//DESCRIPTION:Email Priority. 1 = highest. 5 = lowest. 3 = normal.  | DEFAULT:3  | OPTIONS:1, 2, 3, 4, 5

//$config['crlf'] = "";//DESCRIPTION:Newline character. (Use “\r\n” to comply with RFC 822).  | DEFAULT:\n  | OPTIONS:“\r\n” or “\n” or “\r”

//$config['newline'] = "";//DESCRIPTION:Newline character. (Use “\r\n” to comply with RFC 822).  | DEFAULT:\n  | OPTIONS:“\r\n” or “\n” or “\r”

//$config['bcc_batch_mode'] = "";//DESCRIPTION:Enable BCC Batch Mode.  | DEFAULT:TRUE  | OPTIONS:TRUE or FALSE (boolean)

//$config['bcc_batch_size'] = "";//DESCRIPTION:Number of emails in each BCC batch.  | DEFAULT:200  | OPTIONS:

//$config['dsn'] = "";//DESCRIPTION:Enable notify message from server  | DEFAULT:FALSE  | OPTIONS:TRUE or FALSE (boolean)


$config['org_name'] = "Thumbs-up Inititaitive";//DESCRIPTION:  | DEFAULT:  | OPTIONS:












?>