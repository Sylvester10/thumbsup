-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2023 at 01:58 PM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thumbsup_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `roles` varchar(1000) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pass_reset_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `level`, `roles`, `password`, `pass_reset_code`, `photo`, `photo_thumb`, `last_login`) VALUES
(4, 'Admin', 'admin@thumbsup.com', '08184242507', 2, 'All Roles', '46b99718fd21ebed699ea5ceb15e8231', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `snippet` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `featured_image_thumb` varchar(255) DEFAULT NULL,
  `published` varchar(10) NOT NULL DEFAULT 'true',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `body`, `snippet`, `featured_image`, `featured_image_thumb`, `published`, `date`) VALUES
(3, 'Blooms \'n Daisies Celebrates End Of The Year With Aplomb', 'blooms-n-daisies-celebrates-end-of-the-year-with-aplomb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse ci...', 'Screenshot_2019-11-14_at_10_28_00_PM.png', 'Screenshot_2019-11-14_at_10_28_00_PM_thumb.png', 'true', '2018-11-23 14:24:08'),
(4, 'News With Image In Body', 'news-with-image-in-body', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidat<img src=\"http://topclass.com/assets/uploads/gallery/14.jpg\" alt=\"\" width=\"500\">at non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br><img src=\"localhost/topclass/assets/uploads/gallery/14.jpg\" alt=\"\" width=\"482\" height=\"322\"><br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br><br><br></div>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse ci...', 'IMG_6599.jpg', 'IMG_6599_thumb.jpg', 'true', '2018-11-27 14:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `subject` varchar(225) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `date_sent`) VALUES
(48, 'Sylvester Esso', 'onyekaesso10@gmail.com', 'Test Message', 'This is a test', '2021-08-01 10:57:28'),
(49, 'AnthonyVeD', 'no.reply.feedbackform@gmail.com', 'Mailing Via The Feedback Form.', 'H?ll?!  thumbsupngo.org <br />\r\n <br />\r\nDid y?u kn?w th?t it is p?ssibl? t? s?nd ?pp??l p?rf??tly l?wful? <br />\r\nW? sugg?sting ? n?w l?gitim?t? m?th?d ?f s?nding l?tt?r thr?ugh f??db??k f?rms. Su?h f?rms ?r? l???t?d ?n m?ny sit?s. <br />\r\nWh?n su?h ??mm?r?i?l ?ff?rs ?r? s?nt, n? p?rs?n?l d?t? is us?d, ?nd m?ss?g?s ?r? s?nt t? f?rms sp??ifi??lly d?sign?d t? r???iv? m?ss?g?s ?nd ?pp??ls. <br />\r\n?ls?, m?ss?g?s s?nt thr?ugh ??nt??t F?rms d? n?t g?t int? sp?m b???us? su?h m?ss?g?s ?r? ??nsid?r?d imp?rt?nt. <br />\r\nW? ?ff?r y?u t? t?st ?ur s?rvi?? f?r fr??. W? will s?nd up t? 50,000 m?ss?g?s f?r y?u. <br />\r\nTh? ??st ?f s?nding ?n? milli?n m?ss?g?s is 49 USD. <br />\r\n <br />\r\nThis m?ss?g? is ?r??t?d ?ut?m?ti??lly. Pl??s? us? th? ??nt??t d?t?ils b?l?w t? ??nt??t us. <br />\r\n <br />\r\nContact us. <br />\r\nTelegram - @FeedbackFormEU <br />\r\nSkype  live:.cid.eef97f1d29d827b5 <br />\r\nWhatsApp - +375259112693', '2021-08-02 20:17:07'),
(50, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'How To Turn Eyeballs Into Phone Calls', 'Hi, Eric here with a quick thought about your website thumbsupngo.org...<br />\r\n<br />\r\nI’m on the internet a lot and I look at a lot of business websites.<br />\r\n<br />\r\nLike yours, many of them have great content. <br />\r\n<br />\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.<br />\r\n<br />\r\nI get it – it’s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.<br />\r\n<br />\r\nHere’s a solution for you…<br />\r\n<br />\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to talk with them literally while they’re still on the web looking at your site.<br />\r\n<br />\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.<br />\r\n<br />\r\nIt could be huge for your business – and because you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately… and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.<br />\r\n<br />\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.<br />\r\n<br />\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable. <br />\r\n <br />\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.<br />\r\n<br />\r\nYou could be converting up to 100X more eyeballs into leads today!<br />\r\n<br />\r\nEric<br />\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. <br />\r\nYou have customers waiting to talk with you right now… don’t keep them waiting. <br />\r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.<br />\r\n<br />\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=thumbsupngo.org', '2021-08-17 09:27:13'),
(51, 'Sambo Dasuki', 'mmxx0684@gmail.com', 'Dear Partner', 'Dear Partner; <br />\r\n <br />\r\nI came across your email contact on Database; Where i was searching for a competent Partner who can handle a lucrative business for me as trustee and manager. I anticipate to read from you soon so I can provide you with more details. <br />\r\n <br />\r\nYours Sincerely, <br />\r\nAlh. Sambo Dasuki <br />\r\nmmxx0684@gmail.com', '2021-08-17 21:25:50'),
(52, 'Michael Rajiv', 'michaelrajiv44@gmail.com', 'Need Funding?', 'Hello Dear, <br />\r\n <br />\r\nGreetings to you and I hope this email meet at your best, I am working directly with a private family portfolio that can provide funding for credible clients with feasible projects. Currently, we have investment funds for viable projects. <br />\r\n <br />\r\nThey are interested in the following: Institution, Library, Hospitals, Green energy, <br />\r\nPower projects, Agriculture and Real Estate. They can also partner with your company on other projects of value. The interest rate and tenure are fantastic. <br />\r\n <br />\r\nYour response is most anticipated if this is of interest to you. <br />\r\nReach me on email: funding@euroclearpayments.com or michaelrajiv44@gmail.com <br />\r\n <br />\r\n <br />\r\nKind regards, <br />\r\n <br />\r\nMichael Rajiv <br />\r\nFinancial Consultant <br />\r\nCall: +44 7452 111119 <br />\r\nEuroclear Groups <br />\r\nfunding@euroclearpayments.com <br />\r\nUrl: http://euroclear.com', '2021-08-18 00:31:37'),
(53, 'Donald Cole', 'kendrickbells@donaldocole.com', 'Partnership', 'Good day <br />\r\n <br />\r\n <br />\r\n <br />\r\nI`m seeking a reputable company/individual to partner with in a manner that would benefit both parties. The project is worth $24 Million so <br />\r\nIf interested, kindly contact me through this email donaldcole@donaldocole.com for clarification. <br />\r\n <br />\r\n <br />\r\nI await your response. <br />\r\n <br />\r\n <br />\r\nThanks, <br />\r\n <br />\r\n <br />\r\nDonald Cole', '2021-08-21 21:19:03'),
(54, 'Mike Edwards', 'no-replygema@gmail.com', 'NEW:! 3 Way Domain Clean Up, Never Seen Before', 'Greetings <br />\r\n <br />\r\nGet your thumbsupngo.org ranks back, fix your SEO trend with the best clean-up service ever. <br />\r\n <br />\r\nOur 3 way clean up strategy: <br />\r\n  <br />\r\nWe will check all pages of your website for plagiarism <br />\r\nWe will check all linking domains for indexing, <br />\r\nWe`ll check all linking domains for the TF/CF Ratio <br />\r\n <br />\r\nThen, we`ll assemble your final disavow file and submit it to the google disavow tool <br />\r\n <br />\r\nOrder this service today and in just few weeks time your ranks will be fully restored <br />\r\nhttps://www.digital-x-press.com/product/clean-up-service/ <br />\r\n <br />\r\nIt works and its very effective, email us to send you examples of trend reversals. <br />\r\n <br />\r\nMike Edwards<br />\r\n <br />\r\nSEO X Press <br />\r\nsupport@digital-x-press.com', '2021-09-03 10:07:44'),
(55, 'Mike Lawman', 'no-replygema@gmail.com', 'Increase Sales For Thumbsupngo.org', 'Hi there <br />\r\n <br />\r\nDo you want a quick boost in ranks and sales for your thumbsupngo.org website? <br />\r\nHaving a high DA score, always helps <br />\r\n <br />\r\nGet your thumbsupngo.org to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great feat. <br />\r\n <br />\r\nSee our offers here: <br />\r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ <br />\r\n <br />\r\nNEW: <br />\r\nhttps://www.monkeydigital.co/product/ahrefs-dr60/ <br />\r\n <br />\r\n <br />\r\nthank you <br />\r\nMike Lawman<br />\r\n <br />\r\nsupport@monkeydigital.co', '2021-09-04 11:47:15'),
(56, 'Mike Baker', 'no-replygema@gmail.com', 'Local SEO For More Business', 'Hello <br />\r\n <br />\r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. <br />\r\n <br />\r\nPlease check our plans here, we offer Local SEO at cheap rates. <br />\r\nhttps://speed-seo.net/product/local-seo-package/ <br />\r\n <br />\r\nNEW: <br />\r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ <br />\r\n <br />\r\nregards <br />\r\nMike Baker<br />\r\n <br />\r\nSpeed SEO Digital Agency', '2021-09-08 19:41:45'),
(57, 'Eric Jones', 'eric.jones.z.mail@gmail.com', 'How To Turn Eyeballs Into Phone Calls', 'Hi, Eric here with a quick thought about your website thumbsupngo.org...<br />\r\n<br />\r\nI’m on the internet a lot and I look at a lot of business websites.<br />\r\n<br />\r\nLike yours, many of them have great content. <br />\r\n<br />\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.<br />\r\n<br />\r\nI get it – it’s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.<br />\r\n<br />\r\nHere’s a solution for you…<br />\r\n<br />\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to talk with them literally while they’re still on the web looking at your site.<br />\r\n<br />\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.<br />\r\n<br />\r\nIt could be huge for your business – and because you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately… and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.<br />\r\n<br />\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.<br />\r\n<br />\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable. <br />\r\n <br />\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.<br />\r\n<br />\r\nYou could be converting up to 100X more eyeballs into leads today!<br />\r\n<br />\r\nEric<br />\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. <br />\r\nYou have customers waiting to talk with you right now… don’t keep them waiting. <br />\r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.<br />\r\n<br />\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=thumbsupngo.org', '2021-11-09 16:21:35'),
(58, 'Franckline Jakait', 'frankjkait@gmail.com', 'I Wanna Be An Ambassador', 'Am in kenya and i wish to be the brand ambassador of the initiative in kenya', '2022-04-17 04:35:49'),
(59, 'Gavin Connell', 'gavin@getlisted.directory', 'Thumbsupngo.org Is Listed In 90 Of 241,120 Directories', 'Hello, did you know that there are 241,120 internet directories in the world. <br />\r\n<br />\r\nThese websites are what drive traffic to YOUR business.<br />\r\n<br />\r\nWant more traffic?  Want more Sales?  We can help - today.<br />\r\n<br />\r\nYour website thumbsupngo.org is listed in only 90 of these directories. <br />\r\n<br />\r\nGet more traffic for your Global audience.<br />\r\n<br />\r\nOur automated system adds your website to all of the directories.<br />\r\n<br />\r\nYou can find it here: getlisted.directory/thumbsupngo.org<br />\r\n<br />\r\nAct today, and we will expedite your listings and waive the processing charge!', '2022-06-23 00:30:51'),
(60, 'AnikaKl', 'anikaKl@mail.com', '?\'m Look?ng For ??riou? Man!..', '?ell? ?ll, gu?s? ? know, m? m?s?ag? m?y be t?? ?p?c?f??,<br />\r\n?ut m? ?i?t?r found nice m?n here and the? marr??d, ?? h?w about me?? :)<br />\r\n? am 25 y?ar? old, An?ka, from R?man?a, I kn?w ?ngl??h and G?rman l?nguages ?l??<br />\r\n?nd... ? hav? ?pec?f?? d????se, n?m?d n?m?hom?ni?. ?ho know what ?? thi?, can und?rstand m? (bett?r t? ?ay ?t ?mmed?atel?)<br />\r\n?h ye?, ? ?o?k very ta?t?? and I l?ve n?t onl? c??k ;))<br />\r\nIm real girl, not ?r??titute, and l?ok?ng f?r ??r?ou? ?nd hot relati?nshi?...<br />\r\nAn?w??, you ??n f?nd m? ?rof?le her?: http://ghalnoptiohand.tk/user/46403/', '2022-06-25 03:03:53'),
(61, 'Monroe Wilbur', 'onlineb2bconsulting@gmail.com', 'Instagram Followers', 'Hello!<br />\r\n<br />\r\nI see your page on IG https://www.instagram.com/thumbsupngo - love it!<br />\r\n<br />\r\nQuestion, do you have products that you sell yourself?<br />\r\n<br />\r\nTarget Your Competitors IF Followers and Grow Your IG / Store / Sales!<br />\r\n<br />\r\nThat\'s right.  We can send you a list of your biggest competitors followers for you to market to!<br />\r\n<br />\r\nLooking for a fast way to scale your followers or sales?<br />\r\n<br />\r\nTarget your followers and your competitors with a quick email or text message.<br />\r\n<br />\r\nTell us the IG account you want, we will build a CSV file that will have some emails, phones and contacts for all followers.<br />\r\n<br />\r\nhttps://cutt.ly/getfollowers', '2022-06-27 23:23:16'),
(62, 'Esperanza Macmillan', 'esperanza@makemysitemobile.com', 'Convert Thumbsupngo.org To An App.', 'Convert thumbsupngo.org to an app with one click!<br />\r\n<br />\r\n80% of users browse websites from their phones. <br />\r\n<br />\r\nHave the App send out push notifications without any extra marketing costs!<br />\r\n<br />\r\nMakeMySiteMobile.com', '2022-07-06 05:23:59'),
(63, 'Kate Trilly', 'katytrilly9@gmail.com', 'Explainer Video For Thumbsupngo.org?', 'Hi,<br />\r\n<br />\r\nWe\'d like to introduce to you our explainer video service, which we feel can benefit your site thumbsupngo.org.<br />\r\n<br />\r\nCheck out some of our existing videos here:<br />\r\nhttps://www.youtube.com/watch?v=bWz-ELfJVEI<br />\r\nhttps://www.youtube.com/watch?v=Y46aNG-Y3rM<br />\r\nhttps://www.youtube.com/watch?v=hJCFX1AjHKk<br />\r\n<br />\r\nAll of our videos are in a similar animated format as the above examples, and we have voice over artists with US/UK/Australian accents.<br />\r\nWe can also produce voice overs in languages other than English.<br />\r\n<br />\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video sites such as YouTube, and can be embedded into your website or featured on landing pages.<br />\r\n<br />\r\nOur prices start at $3499 and includes scriptwriting, concept art, storyboarding, professional voice over, music, and sound effects.<br />\r\n<br />\r\nIf this is something you would like to discuss further, don\'t hesitate to reply.<br />\r\n<br />\r\nKind Regards,<br />\r\nKate', '2022-10-21 22:36:57'),
(64, 'Nataliavop', 'nataliavop@gmail.com', 'I ?m Not ? ??alous G?rl. L?oking For A ??r??u? M?n?..', '?ell?!<br />\r\nP?rha?? my me?s?g? ?? t?o ??ec?fic.<br />\r\n?ut m? ?lder s??ter f?und ? wonderful man h?r? ?nd th?y h?v? ? gre?t r?lat??nshi?, but what ?bout m??<br />\r\n? am 28 y?ar? ?ld, N?t?li?, from the ?ze?h Re?ubl??, kn?w ?ngli?h l?nguag? al??<br />\r\nAnd... better to ?ay it ?mm?diatel?. ? ?m b?se?ual. I am not ?e?lou? ?f an?ther woman... ??p?cially if we mak? l?v? tog?ther.<br />\r\nAh ?e?, I co?k v?r? t??ty! and ? lov? not ?nly c?ok ;))<br />\r\nIm r??l girl and l??king for s?r??us and h?t rel?t??n?hip...<br />\r\n?n?w?y, y?u ??n f?nd my ?rofile h?re: http://qualasipa.tk/topic-2002/', '2022-12-06 21:24:19'),
(65, 'Tyroneral', 'support@capitalfund-hk.com', 'Business Funding', 'Capital Fund International Limited has been working in close partnership with various Business/Financial Consultants and every business and industrial sector all over the world. <br />\r\n <br />\r\nOur Financial services; Funding, Loan, collateral Facilities/Instrument and expertise is the safety net that you require in your Business. <br />\r\n <br />\r\nRequire funding/ Loan from 1 Million to 10 Billion USD/EURO/GBP and Above? <br />\r\n <br />\r\n+852 3008 8373 <br />\r\nCapital Fund International Limited <br />\r\nhttp://www.capitalfund-hk.com/ <br />\r\ninfo@capitalfund-hk.com', '2022-12-22 10:10:43'),
(66, 'Nataliakl', 'nataliakl@mondmema.tk', '?om?n\'? ?ou?le. ?? W?nt To Me?t ? M?n!...', '??llo!<br />\r\nI ?pologize f?r the ov?rl? ?pe??f?c me?sag?.<br />\r\n?y g?rlfriend ?nd I lov? e?ch ?th?r. And w? ?re ?ll gr?at.<br />\r\n?ut... we need a man.<br />\r\n?? ar? 27 ?e?r? ?ld, from Romani?, w? ?l?? know ?ngl?sh.<br />\r\nWe nev?r g?t bor?d! ?nd not ?nly in talk...<br />\r\nMy n?me ?? N?tali?, my prof?l? ?? h?re: http://taigetrapatlo.tk/item-15232/', '2023-01-05 05:27:40'),
(67, 'Samuelmr', 'alexandermew@myoumedicie.com', '??en Wanting T? Fu?k The G?rl Next Do?r For A Long T?me?', '?r??te ? ?lone of her in thi? g?m???! http://guetowee.cf/prd-39282/<br />\r\nAnd fuck her w?thout lim?ts, a? ?ou ?lwa?? w?nt?d. ?he won\'t r?fus? ??u!<br />\r\nIf ?ou w?nt, fuck not ?nl? h?r, but als? h?r g?rlfri?nd. ??multan??u?ly!<br />\r\n... ?r m??be y?u want her t? fu?k ?ou? :)', '2023-04-23 09:27:50'),
(68, 'Georgina Haynes', 'georginahaynes95@gmail.com', 'Explainer Video For Your Website?', 'Hi,<br />\r\n<br />\r\nWe\'d like to introduce to you our explainer video service, which we feel can benefit your site thumbsupngo.org.<br />\r\n<br />\r\nCheck out some of our existing videos here:<br />\r\nhttps://www.youtube.com/watch?v=zvGF7uRfH04<br />\r\nhttps://www.youtube.com/watch?v=cZPsp217Iik<br />\r\nhttps://www.youtube.com/watch?v=JHfnqS2zpU8<br />\r\n<br />\r\nAll of our videos are in a similar animated format as the above examples, and we have voice over artists with US/UK/Australian accents.<br />\r\nWe can also produce voice overs in languages other than English.<br />\r\n<br />\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video sites such as YouTube, and can be embedded into your website or featured on landing pages.<br />\r\n<br />\r\nOur service includes a full script, voice-over and video.<br />\r\n<br />\r\nIf this is something you would like to discuss further, don\'t hesitate to reply.<br />\r\n<br />\r\nKind Regards,<br />\r\nGeorgina', '2023-04-28 03:55:09'),
(69, 'Carmel Chacon', 'alfredgennick@outlook.com', 'Dear Thumbsupngo.org Admin!', '12 000 000 messages to the whole world - new marketing tool for your company.<br />\r\n<br />\r\nSteps to get it:<br />\r\n1. Go to website https://search-any-web.com<br />\r\n2. Register and login<br />\r\n3. Do search and press \"Send Messages\"<br />\r\n4. Sit back and relax, we will do the rest and send you report<br />\r\n<br />\r\nWe have hudge database - more than 80 mil. websites. If you need something more - contact via email info@search-any-web.com<br />\r\n<br />\r\nSome screens - https://postimg.cc/gallery/2zhrCvt', '2023-05-14 23:48:10'),
(70, 'This Is Check', 'victoresso97@gmail.com', 'Domains Not Active Or Working... Not Sending Any Data\"', 'Thuij', '2023-05-23 12:12:48'),
(71, 'Josh Brolin', 'admin@sharemybag.uk', 'Test Message', 'Testing', '2023-05-23 12:14:33'),
(72, 'Christinasn', 'christinasn@robertbadal.com', '??n ? F?nd Her? ??ri?us M?n? :)', '?ello all, gu??! I know, my me??ag? may b? t?o sp??if?c,<br />\r\n?ut m? si?ter f?und n?c? man her? and the? m?rried, ?? h?w about me?! :)<br />\r\n? am 26 year? old, ?hri?tin?, fr?m R?mani?, I know English ?nd G?rm?n langu?g?? al?o<br />\r\n?nd... I h?v? ?pec?f?c di?e???, nam?d nymphom?n?a. Wh? know wh?t is thi?, ??n under?tand m? (b?tter to s?? ?t immed?at?l?)<br />\r\nAh ??s, I c?ok very ta?ty! ?nd ? l?ve n?t onl? c?ok ;))<br />\r\n?m real girl, n?t pr??t?tut?, and looking f?r ?er?ous and h?t rel?t?onshi?...<br />\r\n?nyw??, you c?n f?nd m? prof?le h?r?: http://wrigberkahatkund.tk/idm-4663/', '2023-05-24 22:20:06'),
(73, 'Katie Simpson', 'simpsonkatie917@gmail.com', 'Explainer Video For Your Website', 'Hi,<br />\r\n<br />\r\nWe\'d like to introduce to you our explainer video service, which we feel can benefit your site thumbsupngo.org.<br />\r\n<br />\r\nCheck out some of our existing videos here:<br />\r\nhttps://www.youtube.com/watch?v=bWz-ELfJVEI<br />\r\nhttps://www.youtube.com/watch?v=Y46aNG-Y3rM<br />\r\nhttps://www.youtube.com/watch?v=hJCFX1AjHKk<br />\r\n<br />\r\nAll of our videos are in a similar animated format as the above examples, and we have voice over artists with US/UK/Australian accents. We can also produce voice overs in languages other than English.<br />\r\n<br />\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video sites such as YouTube, and can be embedded into your website or featured on landing pages.<br />\r\n<br />\r\nOur rates are as follows depending on video length:<br />\r\n<br />\r\nUp to 1 minute = $259<br />\r\n1-2 minutes = $379<br />\r\n2-3 minutes = $489<br />\r\n<br />\r\n*The above are in USD and include full script, voice-over and video.<br />\r\n<br />\r\nIf this is something you would like to discuss further, don\'t hesitate to reply.<br />\r\n<br />\r\nKind Regards,<br />\r\nKatie', '2023-05-26 17:20:25'),
(74, 'Libby Evans', 'libbyevans461@gmail.com', 'Get Noticed On Instagram: Gain 400-1200 New Followers Each Month', 'Hi there,<br />\r\n<br />\r\nWe run an Instagram growth service, which increases your number of followers both safely and practically. <br />\r\n<br />\r\n- Guaranteed: We guarantee to gain you 400-1200+ followers per month.<br />\r\n- Real, human followers: People follow you because they are interested in your business or niche.<br />\r\n- Safe: All actions are made manually. We do not use any bots.<br />\r\n<br />\r\nThe price is just $60 (USD) per month, and we can start immediately.<br />\r\n<br />\r\nIf you are interested, and would like to see some of our previous work, let me know and we can discuss further.<br />\r\n<br />\r\nKind Regards,<br />\r\nLibby', '2023-05-27 19:51:33'),
(75, 'Hildred Tomczak', 'tomczak.hildred@hotmail.com', 'Meet Robin A.I.: Your All-in-One Virtual Assistant', 'Hi there,<br />\r\n<br />\r\nWe would like to introduce to you Robin A.I., the world\'s first app that replaces your entire team with an AI assistant.<br />\r\n<br />\r\nDiscover the game-changing capabilities here: https://t.ly/WGpr<br />\r\n<br />\r\n- Robin A.I. replaces multiple apps and tools, streamlining your workflow and saving you time and money.<br />\r\n- Instantly generate high-quality, human-like content tailored to any niche.<br />\r\n- Turn any keyword into eye-catching designs that grab attention and enhance your visual presence.<br />\r\n- Unlimited Traffic and Sales: Drive unlimited traffic and sales to any offer or link, maximizing your revenue potential.<br />\r\n- Replace Multiple Roles: Robin A.I. eliminates the need for a designer, programmer, writer, and more, providing a comprehensive solution in one place.<br />\r\n<br />\r\nHildred', '2023-06-06 12:49:01'),
(76, 'Serena Gass', 'serena.gass@hotmail.com', 'Meet Robin A.I.: Your All-in-One Virtual Assistant', 'Hi there,<br />\r\n<br />\r\nWe would like to introduce to you Robin A.I., the world\'s first app that replaces your entire team with an AI assistant.<br />\r\n<br />\r\nDiscover the game-changing capabilities here: http://tiny.cc/robinai<br />\r\n<br />\r\n- Robin A.I. replaces multiple apps and tools, streamlining your workflow and saving you time and money.<br />\r\n- Instantly generate high-quality, human-like content tailored to any niche.<br />\r\n- Turn any keyword into eye-catching designs that grab attention and enhance your visual presence.<br />\r\n- Unlimited Traffic and Sales: Drive unlimited traffic and sales to any offer or link, maximizing your revenue potential.<br />\r\n- Replace Multiple Roles: Robin A.I. eliminates the need for a designer, programmer, writer, and more, providing a comprehensive solution in one place.<br />\r\n<br />\r\nSerena<br />\r\n<br />\r\nUnsubscribe: If you do not wish us to contact you again, let us know here: https://rb.gy/mgkbd', '2023-06-16 05:02:24'),
(77, 'Megan Atkinson', 'meganatkinson352@gmail.com', 'Instagram Promotion: Grow Your Followers By 400-1200 Each Month', 'Hi there,<br />\r\n<br />\r\nWe run an Instagram growth service, which increases your number of followers both safely and practically. <br />\r\n<br />\r\n- Guaranteed: We guarantee to gain you 400-1200+ followers per month.<br />\r\n- Real, human followers: People follow you because they are interested in your business or niche.<br />\r\n- Safe: All actions are made manually. We do not use any bots.<br />\r\n<br />\r\nThe price is just $60 (USD) per month, and we can start immediately.<br />\r\n<br />\r\nIf you are interested, and would like to see some of our previous work, let me know and we can discuss further.<br />\r\n<br />\r\nKind Regards,<br />\r\nMegan', '2023-06-18 20:27:59'),
(78, 'Cortney Sidaway', 'makemybusinessgreatagain@gmail.com', 'Leads For Your Company - DataList2023.com', 'It is with sad regret we are shutting down.<br />\r\n<br />\r\nWe have made all our leads available for a one time fee on DataList2023.com<br />\r\n<br />\r\nRegards,<br />\r\nCortney', '2023-06-19 00:57:10'),
(79, 'KarinaTaut', 'karinaTaut@rubenlazcano.com', 'I Am ?n ?rd?nary Girl. ? W?nt To Meet ?n Ord?nary ?eri?us M?n.', '??!<br />\r\n?\'v? not???d that many guys pr?f?r r?gular girl?.<br />\r\n? ??pl?ude the men ?ut there wh? had the b?lls to ?n?oy th? love ?f m?ny wom?n ?nd ch???? the one that he kn?w w?uld b? h?s b?st fri?nd during the bum?? ?nd craz? thing call?d life.<br />\r\nI w?nted to b? that fri?nd, not just a st?ble, r?l??bl? and b?ring h?usewif?.<br />\r\nI am 27 y??rs old, Karina, from the ?z??h Republ?c, know Engl??h l?nguage also.<br />\r\n?n?wa?, you can f?nd m? ?rofil? h?r?: http://cosigdimeaversco.tk/idi-84762/', '2023-06-22 02:56:49'),
(80, 'Mariatum', 'mariatum@officepest.com', '?omen\'s Cou?l?. ?? Want To Me?t A Man?...', '??llo!<br />\r\n? ?p?l?giz? for the overly s?ec?f?? m?ss?ge.<br />\r\n?y girlfr??nd and I love ?ach ?th?r. And we ?r? ?ll gr?at.<br />\r\n?ut... we ne?d a man.<br />\r\nW? ar? 27 y??r? ?ld, fr?m Rom?ni?, w? ?l?? know ?nglish.<br />\r\n?e n?ver get bor?d? ?nd n?t onl? in talk...<br />\r\n?y nam? ?? M?ria, my ?rofil? ?s h?re: http://rinetkonapha.tk/rdx-17782/', '2023-06-22 21:15:09'),
(81, 'LinaPa', 'linaPa@mysafeplant.com', '? Am ?n Ordinar? G?rl. ? W?nt T? Me?t An ?rdin?r? Seri?u? Man.', '???<br />\r\n?\'ve n?t???d that m?ny guy? pr?f?r regular girls.<br />\r\n? ???l?ud? the men ?ut th?re who h?d the b?lls t? en?oy the lov? ?f many wom?n ?nd ?h??s? th? ?ne th?t he knew would be hi? b?st fri?nd during th? bump? ?nd ?razy thing c?lled l?fe.<br />\r\nI wanted to b? that fr?end, not ?u?t a ?t?ble, reliable ?nd bor?ng housew?fe.<br />\r\nI am 25 ?ear? ?ld, Lina, from the ?z??h R?publ??, kn?w ?ngl?sh langu?ge ?l?o.<br />\r\n?n?wa?, ??u ??n find m? profile h?re: http://bhujartuvernri.tk/idl-68248/', '2023-07-11 19:47:03'),
(82, 'Lucy Graham', 'lucygraham966@gmail.com', 'Twitter Promotion: 400-1000 New Followers Each Month', 'Hi there,<br />\r\n<br />\r\nWe run a Twitter growth service, which increases your number of followers both safely and practically. <br />\r\n<br />\r\n- We guarantee to gain you 500-1000+ followers per month.<br />\r\n- People follow you because they are interested in you, increasing likes, comments and interaction.<br />\r\n- All actions are made manually by our team. We do not use any \'bots\'.<br />\r\n<br />\r\nThe price is just $60 (USD) per month, and we can start immediately.<br />\r\n<br />\r\nIf you are interested, and would like to see some of our previous work, visit our website here and complete the form: https://rb.gy/c50jp<br />\r\n<br />\r\nNot interested? Unsubscribe here and we won\'t contact you again: https://rb.gy/mgkbd<br />\r\n<br />\r\nKind Regards,<br />\r\nLucy', '2023-07-11 23:30:37'),
(83, 'Megan Atkinson', 'meganatkinson149@gmail.com', 'Instagram Promotion: 400-1200 New Followers Each Month', 'Hi there,<br />\r\n<br />\r\nWe run an Instagram growth service, which increases your number of followers both safely and practically. <br />\r\n<br />\r\n- We guarantee to gain you 400-1000+ followers per month.<br />\r\n- People follow you because they are interested in you, increasing likes, comments and interaction.<br />\r\n- All actions are made manually by our team. We do not use any \'bots\'.<br />\r\n<br />\r\nThe price is just $60 (USD) per month, and we can start immediately.<br />\r\n<br />\r\nIf you\'d like to see some of our previous work, let me know, and we can discuss it further.<br />\r\n<br />\r\nKind Regards,<br />\r\nMegan', '2023-07-18 11:30:55'),
(84, 'Abi', 'outsourcesmo@gmail.com', 'Content Writing Service', 'Hello, I\'m Abi, a Content Writer. I recently came across your website thumbsupngo.org, and I wanted to reach out to you to offer my services. <br />\r\n<br />\r\nFrom suggesting blog/article topics and relevant keywords to writing content for your website, I can handle it all. Additionally, I specialize in crafting E-Commerce content, product descriptions, infographics, news/press releases, resources, case studies, video scripts, and SEO optimized content. <br />\r\n<br />\r\nI charge USD 50 per 1000 words of content. <br />\r\n<br />\r\nSend me an email at outsourcesmo@gmail.com if you need any help.', '2023-07-18 17:15:44'),
(85, 'Annatum', 'annatum@punitsprofile.com', '??m?n\'? C?u?l?. W? W?nt To Meet A Man?...', 'H?llo!<br />\r\nI ???log?z? f?r th? ov?rly ?p??ifi? me?s?ge.<br />\r\nMy girlfr?end and ? l?v? ea?h ?th?r. ?nd w? ar? all gre?t.<br />\r\n?ut... w? n??d ? m?n.<br />\r\nW? ?re 24 ??ar? old, fr?m R?mania, w? al?? kn?w ?ngli?h.<br />\r\n?e never g?t b?r?d? And n?t only in t?lk...<br />\r\nMy name is Ann?, my ?r?file ?s h?re: http://nfotilkris.gq/rdx-86969/', '2023-07-21 00:43:52'),
(86, 'Ariel Cline', 'ariel.cline@gmail.com', '$150/day Uploading Instagram Pics', 'Hi there,<br />\r\n<br />\r\n\"We are looking for social media users to share this promotional photo for our company on Facebook. Payment for this task is $25\"<br />\r\n<br />\r\nHow would you like this to be your job? Would you like to earn some money every time you use Facebook, Twitter, or YouTube? <br />\r\n<br />\r\nIf you know how to use social media sites like Facebook, Twitter, and YouTube, have a few hours per week, and want to work online, you can get a job with us. Your tasks will include helping businesses share images, videos, and posting comments on social media. <br />\r\n<br />\r\nFull training is included and you can begin work right away. Positions are filling fast though, so if you are interested, make sure you apply now before your spot is taken.<br />\r\n<br />\r\nClick this link and start work now: https://shorturl.at/npsCW<br />\r\n<br />\r\nThank you<br />\r\nAriel<br />\r\n<br />\r\nUnsubscribe: If you do not wish us to contact you again, let us know here: https://rb.gy/mgkbd', '2023-07-24 11:15:00'),
(87, 'Nestor D.', 'pat@aneesho.com', 'Design Work', 'Just wanted to ask if you would be interested in getting external help with graphic design? We do all design work like banners, advertisements, photo edits, logos, flyers, etc. for a fixed monthly fee. <br />\r\n<br />\r\nWe don\'t charge for each task. What kind of work do you need on a regular basis? Let me know and I\'ll share my portfolio with you.', '2023-07-25 06:30:43'),
(88, 'Nestor D.', 'pat@aneesho.com', 'Design Work', 'Just wanted to ask if you would be interested in getting external help with graphic design? We do all design work like banners, advertisements, photo edits, logos, flyers, etc. for a fixed monthly fee. <br />\r\n<br />\r\nWe don\'t charge for each task. What kind of work do you need on a regular basis? Let me know and I\'ll share my portfolio with you.', '2023-07-25 06:30:48'),
(89, 'Christinatum', 'christinatum@rhyshafod.com', 'Women\'? C?uple. W? W?nt T? Meet ? Man?...', '?ello!<br />\r\n? apolog?z? f?r the ov?rl? ?p???fic m????ge.<br />\r\n?y girlfriend ?nd I lov? e??h oth?r. And we ?r? all gr??t.<br />\r\n?ut... w? ne?d a m?n.<br />\r\nW? ?r? 25 ?e?rs ?ld, fr?m Rom?n?a, we ?l?? know english.<br />\r\n?e n?v?r get bored! And n?t ?nly ?n t?lk...<br />\r\n?? n?me ?s Christ?na, my ?rof?le ?s here: http://truvdempcal.ga/rdx-36464/', '2023-07-26 08:48:19'),
(90, 'Tyler Shick', 'tyler.shick@gmail.com', 'Get 100K Visitors/m To Thumbsupngo.org With Our New AI-Powered FACE Strategy', 'Discover the SECRET AI HACK that drives millions of visitors with 30-sec AI FACE videos!<br />\r\n<br />\r\nIntroducing ViralFaces AI - create attention-grabbing A.I. Face Videos effortlessly, gaining 10x more sales, followers, and engagement.<br />\r\n<br />\r\nToday Only $17.95<br />\r\n<br />\r\nWatch the quick demo here: https://shorturl.at/glq47<br />\r\n<br />\r\nTyler<br />\r\n<br />\r\nUnsubscribe: If you do not wish us to contact you again, let us know here: https://rb.gy/mgkbd', '2023-08-05 20:41:38'),
(91, 'NataliaEr', 'nataliaEr@orbitonuk.com', 'I Am ?n ?rd?nary Girl. I W?nt To Meet ?n ?rd?n?ry Ser??u? M?n.', 'Hi?<br />\r\nI\'ve not???d that m?ny gu?? pref?r r?gular g?rl?.<br />\r\nI ?ppl?ud? th? men ?ut ther? who h?d th? b?lls t? ?n?o? the l?ve ?f many women ?nd ?h???e th? on? th?t he knew w?uld b? hi? b?st fr?end dur?ng th? bum?? and ?r?z? thing ?alled life.<br />\r\n? w?nted to be that fri?nd, not ju?t a ?t?ble, r?li?ble ?nd bor?ng h?usew?fe.<br />\r\n? ?m 28 y??rs old, ?at?li?, from th? Cz?ch Republ??, know English l?nguage als?.<br />\r\n?n?way, you c?n f?nd my ?r?file her?: http://tiaberzemeblioki.tk/idi-8197/', '2023-08-30 11:54:24'),
(92, 'GeorgePab', 'no.reply.ThierryBrown@gmail.com', 'Do You Need A Cost-efficient And Innovative Advertising Solution?', 'Hi! thumbsupngo.org <br />\r\n <br />\r\nDid you know that it is possible to send letter completely lawful and perfectly? We submit a new way of sending requests through feedback forms. These feedback forms can be located on a host of webpages. <br />\r\nWhen such appeals are sent, no personal information is utilized, and messages are delivered to forms specifically created to securely receive messages and appeals. Because of their importance, messages sent via Feedback Forms are not labeled as spam. <br />\r\nTr? out our service without paying a d?me! <br />\r\nOur service lets you send up to 50,000 messages. <br />\r\n <br />\r\nThe cost of sending one million messages is $59. <br />\r\n <br />\r\nThis letter is automatically generated. <br />\r\nPlease use the contact details below to get in touch with us. <br />\r\n <br />\r\nContact us. <br />\r\nTelegram - https://t.me/FeedbackFormEU <br />\r\nSkype  live:feedbackform2019 <br />\r\nWhatsApp  +375259112693 <br />\r\nWhatsApp  https://wa.me/+375259112693 <br />\r\n <br />\r\nWe only use chat for communication.', '2023-09-03 21:36:15'),
(93, 'Megan Atkinson', 'meganatkinson149@gmail.com', 'Instagram Promotion: 400-1200 New Followers Each Month', 'Hi there,<br />\r\n<br />\r\nWe run an Instagram growth service, which increases your number of followers both safely and practically. <br />\r\n<br />\r\n- We guarantee to gain you 400-1000+ followers per month.<br />\r\n- People follow you because they are interested in you, increasing likes, comments and interaction.<br />\r\n- All actions are made manually by our team. We do not use any \'bots\'.<br />\r\n<br />\r\nThe price is just $60 (USD) per month, and we can start immediately.<br />\r\n<br />\r\nIf you\'d like to see some of our previous work, let me know, and we can discuss it further.<br />\r\n<br />\r\nKind Regards,<br />\r\nMegan<br />\r\n<br />\r\nTo unsubscribe: https://removeme.click/unsubscribe.php?d=thumbsupngo.org', '2023-09-05 23:16:22'),
(94, 'Georgina Haynes', 'georginahaynes620@gmail.com', 'Explainer Video For Thumbsupngo.org', 'Hi,<br />\r\n<br />\r\nWe\'d like to introduce to you our explainer video service, which we feel can benefit your site thumbsupngo.org.<br />\r\n<br />\r\nCheck out some of our existing videos here:<br />\r\nhttps://www.youtube.com/watch?v=bWz-ELfJVEI<br />\r\nhttps://www.youtube.com/watch?v=Y46aNG-Y3rM<br />\r\nhttps://www.youtube.com/watch?v=hJCFX1AjHKk<br />\r\n<br />\r\nAll of our videos are in a similar animated format as the above examples, and we have voice over artists with US/UK/Australian accents. We can also produce voice overs in languages other than English.<br />\r\n<br />\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video sites such as YouTube, and can be embedded into your website or featured on landing pages.<br />\r\n<br />\r\nOur prices are as follows depending on video length:<br />\r\nUp to 1 minute = $259<br />\r\n1-2 minutes = $379<br />\r\n2-3 minutes = $489<br />\r\n<br />\r\n*All prices above are in USD and include a full script, voice-over and video.<br />\r\n<br />\r\nIf this is something you would like to discuss further, don\'t hesitate to reply.<br />\r\n<br />\r\nKind Regards,<br />\r\nGeorgina<br />\r\n<br />\r\nIf you are not interested, unsubscribe here: https://explainervideos4u.net/unsubscribe.php?d=thumbsupngo.org', '2023-09-15 23:19:55'),
(95, 'Raymondaleta', 'no.reply.EdwardNilsen@gmail.com', 'Do You Plan To Attract More Customers For Your Business?', 'Hi there! thumbsupngo.org <br />\r\n <br />\r\nDid you know that it is possible to send letter absolutely legally? We are suggesting a new and legitimate method of sending business proposals through feedback forms. These feedback forms can be spotted on many websites. <br />\r\nWhen such business proposals are sent, no personal data is used, and messages are securely sent to forms specifically designed to receive them. It is improbable to have Feedback Forms messages marked as spam, since they are considered important. <br />\r\nWe are now offering you the chance to use our service for free. <br />\r\nWe will transmit up to 50,000 messages to you. <br />\r\n <br />\r\nThe cost of sending one million messages is $59. <br />\r\n <br />\r\nThis offer is automatically generated. <br />\r\nPlease use the contact details below to get in touch with us. <br />\r\n <br />\r\nContact us. <br />\r\nTelegram - https://t.me/FeedbackFormEU <br />\r\nSkype  live:contactform_18 <br />\r\nWhatsApp - +375259112693 <br />\r\nWhatsApp  https://wa.me/+375259112693 <br />\r\nWe only use chat for communication.', '2023-09-20 11:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `day` varchar(50) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `date_unix` varchar(255) DEFAULT NULL,
  `event_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `caption` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `snippet` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `guest` varchar(255) DEFAULT NULL,
  `moderator` varchar(255) DEFAULT NULL,
  `zoom_link` varchar(255) DEFAULT NULL,
  `google_form` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `featured_image_thumb` varchar(255) DEFAULT NULL,
  `published` varchar(10) NOT NULL DEFAULT 'false',
  `date_created` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `day`, `month`, `year`, `date_unix`, `event_date`, `end_date`, `time`, `end_time`, `caption`, `description`, `snippet`, `venue`, `host`, `guest`, `moderator`, `zoom_link`, `google_form`, `featured_image`, `featured_image_thumb`, `published`, `date_created`) VALUES
(1, '18', '09', '2021', '20210918', '2021-09-17 22:00:00', '0000-00-00 00:00:00', '6:00 PM', '9:11 PM', 'Am I Too Young To Lead?', 'Thumbs Up youth leadership Development Initiative presents an Instagram live chat session Themed \"AM I TOO YOUNG TO LEAD?\". Its a 1 Hour live session on the 18th September, 2021 from 6pm to 7pm.', 'Thumbs Up youth leadership Development Initiati...', 'Instagram <b>@thumbsupngo</b>', 'Onyinyechi Ekumankama', 'Olusoji Oyawoye, Adenike Oyetunde-Lawal', 'None', 'Na', 'Na', 'WhatsApp_Image_2021-09-14_at_10_10_11_PM.jpeg', 'WhatsApp_Image_2021-09-14_at_10_10_11_PM_thumb.jpeg', 'true', 1633637596),
(2, '24', '09', '2021', '20210924', '2021-09-23 22:00:00', NULL, '12:00 AM', NULL, 'The University Of YOU', 'Study, know who you are, begin your journey to a purposeful life.8- weekends , 1 day per weekend, online university and its all about YOU. FACULTY OF SELF: Self Awareness, Self Mastery, Self Management, Self Love, Self Esteem, Self Identity, Self Acceptance.  FACULTY OF LEADERSHIP: Public speaking communication skill and development, Interpersonal relation management, People Leadership, Vision board creation.', 'Study, know who you are, begin your journey to ...', 'Online University', 'Gloria A. Ajoge-Adaba', 'Gloria A. Ajoge-Adaba', NULL, '#', '#', 'WhatsApp_Image_2021-09-23_at_9_22_01_PM.jpeg', 'WhatsApp_Image_2021-09-23_at_9_22_01_PM_thumb.jpeg', 'true', 1632439416),
(3, '10', '11', '2021', '20211110', '2021-11-09 22:00:00', '2021-11-09 22:00:00', '9:00 AM', '9:00 AM', 'The Listening Workshop', '<p></p><ul><li>We are listening to you more than we speak,</li><li>We are ready to listen to your ideas, </li><li>We listen while we have fun, </li><li>We give you the platform to express yourself and learn at thesame time.</li></ul><p></p>', 'We are listening to you more than we speak,We a...', '23 Emmanuel Kesh Street, Magodo\'s Phase II, GRA, Lagos.', '', '', '', '', '', 'Listening.jpg', 'Listening_thumb.jpg', 'true', 1636391541);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `published` varchar(10) NOT NULL DEFAULT 'false',
  `date` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `caption`, `photo`, `published`, `date`) VALUES
(106, NULL, '-5785296488329491648_121.jpg', 'true', 1628113490),
(107, NULL, '-5785296488329491649_121.jpg', 'true', 1628113490),
(108, NULL, '-5785296488329491650_121.jpg', 'true', 1628113490),
(109, NULL, '-5785296488329491651_121.jpg', 'true', 1628113491),
(110, NULL, '-5785296488329491652_121.jpg', 'true', 1628113491),
(111, NULL, '-5785296488329491653_121.jpg', 'true', 1628113491),
(112, NULL, '-5785296488329491655_121.jpg', 'true', 1628113493),
(113, NULL, '-5785296488329491656_121.jpg', 'true', 1628113493),
(114, NULL, '-5785296488329491657_121.jpg', 'true', 1628113493),
(115, NULL, '-5785296488329491658_121.jpg', 'true', 1628113493),
(116, NULL, '-5785296488329491659_121.jpg', 'true', 1628113494),
(117, NULL, '-5785296488329491660_121.jpg', 'true', 1628113494),
(118, NULL, '-5785296488329491661_121.jpg', 'false', 1628113494),
(119, NULL, '-5785296488329491662_121.jpg', 'false', 1628113494),
(120, NULL, '-5785296488329491663_121.jpg', 'true', 1628113495),
(121, NULL, '-5785296488329491664_121.jpg', 'true', 1628113495),
(122, NULL, '-5785296488329491665_121.jpg', 'true', 1628113495),
(123, NULL, '-5785296488329491666_121.jpg', 'true', 1628113495),
(124, NULL, '-5785296488329491667_121.jpg', 'true', 1628113495),
(125, NULL, '-5785296488329491668_121.jpg', 'true', 1628113496),
(126, NULL, '-5785296488329491669_121.jpg', 'true', 1628113496),
(127, NULL, '-5785296488329491670_121.jpg', 'true', 1628113496),
(128, NULL, '-5785296488329491671_121.jpg', 'true', 1628113496),
(129, NULL, '-5785296488329491672_121.jpg', 'true', 1628113496);

-- --------------------------------------------------------

--
-- Table structure for table `org_structure`
--

CREATE TABLE `org_structure` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `abbr` varchar(10) DEFAULT NULL,
  `under` varchar(10) DEFAULT NULL,
  `rank` int(10) DEFAULT NULL,
  `hash_key` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `date_added` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `org_structure`
--

INSERT INTO `org_structure` (`id`, `fullname`, `abbr`, `under`, `rank`, `hash_key`, `address`, `type`, `amount`, `date_added`) VALUES
(2, 'Thumbs-Up Initiative', 'TUPI', NULL, 1000, 'bcf1b3be2f036d51d44819d44252b9cc91c40950', 'TUPI', 'structure', NULL, 1624572175),
(29, 'Research And Development Unit', 'RDU', 'ADU', 88, 'eff91c5c26b8a4efc1be06297a5e913f973040cc', 'TUPI/ADU/RDU', 'structure', NULL, 1625488998),
(30, 'Finance Unit', 'FIU', 'ADU', 88, 'ae50a46ee4354efade5d5b5b4d3e7277092c12e4', 'TUPI/ADU/FIU', 'structure', NULL, 1625489045),
(31, 'Public Relation And Welfare Unit', 'PRU', 'ADU', 88, '4346c8d745c6c219f2ccceb7a3ce6f245aa68eae', 'TUPI/ADU/PRU', 'structure', NULL, 1625489070),
(32, 'University Of YOU', 'UNY', 'TRU', 85, '368e91bb69c42ff2ae770e2606105b6d13e0e09a', 'TUPI/ADU/TRU/UNY', 'structure', NULL, 1625489111),
(28, 'Media Unit', 'MDU', 'ADU', 88, '37c2434e0bd1f02d66e653efeeb6b48c5fa61673', 'TUPI/ADU/MDU', 'structure', NULL, 1625488938),
(27, 'Business Unit', 'BSU', 'ADU', 88, '1fdbe0a47d24e774543114fa6a100869ee5b9d7d', 'TUPI/ADU/BSU', 'structure', NULL, 1625488911),
(26, 'Outreach Unit', 'OTU', 'ADU', 88, 'da07788817d298d556b1623ab2af9e0a303a7d58', 'TUPI/ADU/OTU', 'structure', NULL, 1625488584),
(25, 'Training Unit', 'TRU', 'ADU', 88, '7b6a629c3aec469b19b418dacae8e7b6c524ddc1', 'TUPI/ADU/TRU', 'structure', NULL, 1625488460),
(23, 'Boad Of Trustees', 'BOT', 'TUPI', 98, '5d64f40a226c473e99849d9c173c5c020394514f', 'TUPI/BOT', 'structure', NULL, 1625488255),
(24, 'Administrative Unit', 'ADU', 'TUPI', 89, 'cecfb3b79e8278c955fc57434b672daf8a707c28', 'TUPI/ADU', 'structure', NULL, 1625488303),
(33, 'Business And Financial Academy', 'BFA', 'TRU', 84, '03b7868e14b7e5d1c9436c421daa157bbfaa911c', 'TUPI/ADU/TRU/BFA', 'structure', NULL, 1625489173),
(34, 'Institutional Partnerships', 'INP', 'TRU', 84, '82348b76cb97904d39285049b7b8a80e2b28000f', 'TUPI/ADU/TRU/INP', 'structure', NULL, 1625489215),
(35, 'Passive Learning', 'PAL', 'TRU', 84, '5cee187af065bdbb4e941fc730d0e9eaf4e9e843', 'TUPI/ADU/TRU/PAL', 'structure', NULL, 1625489236),
(36, 'Extra-Curricular', 'EXC', 'TRU', 84, '48bdc36e43d9309b3361feaebcea56a2dfcbd54d', 'TUPI/ADU/TRU/EXC', 'structure', NULL, 1625489272),
(37, 'School Of Leadership', 'SCL', 'UNY', 80, '1bd8e503d549b8ed5a8135dac418d1de59b961ff', 'TUPI/ADU/TRU/UNY/SCL', 'structure', NULL, 1625489304),
(38, 'School Of Self', 'SCS', 'UNY', 80, '8d2abb8a4fe323898d7629ce512ada360d6efab0', 'TUPI/ADU/TRU/UNY/SCS', 'structure', NULL, 1625489340),
(39, 'Founder', 'FOD', 'TUPI', 100, 'b99787d09eecf1125a0bec888949d2f00ff87fea', 'TUPI/FOD', 'position', 1, 1625489780),
(41, 'Training Unit Leader', 'TRUL', 'TRU', 80, 'f14971bf573f8a5dca5faf4a5d2822fbffcfd459', 'TUPI/ADU/TRU/TRUL', 'position', 1, 1625491413),
(42, 'Training Unit Member', 'TRUM', 'TRU', 50, '7bb743c8eef93583ecc2d679ab89d406de854ac0', 'TUPI/ADU/TRU/TRUM', 'position', 100, 1625491482),
(43, 'Outreach Unit Member', 'OTUM', 'OTU', 50, '0aea8e49abbdb18c803fc34a3ba6ee669e3ef827', 'TUPI/ADU/OTU/OTUM', 'position', 100, 1625491664),
(44, 'Outreach Unit Leader', 'OTUL', 'OTU', 80, 'f90aa36812b2b0614765549db20c5fecb1d7c2b5', 'TUPI/ADU/OTU/OTUL', 'position', 1, 1625491710),
(45, 'Business Unit Member', 'BSUM', 'BSU', 50, '69c6bcea5802b142da974a0402017d2847204964', 'TUPI/ADU/BSU/BSUM', 'position', 100, 1625491786),
(46, 'Business Unit Leader', 'BSUL', 'BSU', 80, '292e3237d663dad32d6efa736b48bca038c444c0', 'TUPI/ADU/BSU/BSUL', 'position', 1, 1625491826),
(47, 'Media Unit Member', 'MDUM', 'MDU', 50, 'db110c75954dcab707bb39c5250df76fcfebaf6d', 'TUPI/ADU/MDU/MDUM', 'position', 100, 1625491869),
(48, 'Media Unit Leader', 'MDUL', 'MDU', 80, 'b101afe1297b2f3f599ba6c8c83dc823bbd98d29', 'TUPI/ADU/MDU/MDUL', 'position', 1, 1625491933),
(49, 'Research And Development Unit Member', 'RDUM', 'RDU', 50, '7ee51940edf092321bc7a7eed909f4e4df22d8a6', 'TUPI/ADU/RDU/RDUM', 'position', 100, 1625491979),
(50, 'Research And Development Unit Leader', 'RDUL', 'RDU', 80, '43a03875eb3263dcbced3ab92f23c1e2d9f4860c', 'TUPI/ADU/RDU/RDUL', 'position', 1, 1625492080),
(51, 'Finance Unit Member', 'FIUM', 'FIU', 50, '90cae892f91c51c0c03363d04aed64b3ce177d0d', 'TUPI/ADU/FIU/FIUM', 'position', 100, 1625492185),
(52, 'Finance Unit Leader', 'FIUL', 'FIU', 80, 'c754d9ec27b3c2e7d7dcebf67605341ff8c3c42d', 'TUPI/ADU/FIU/FIUL', 'position', 1, 1625492209),
(53, 'Public Relation And Welfare Unit Member', 'PRUM', 'PRU', 50, 'b4d2185af48fe870da6588739b0683d5d8c718b7', 'TUPI/ADU/PRU/PRUM', 'position', 100, 1625492272),
(54, 'Public Relation And Welfare Unit Leader', 'PRUL', 'PRU', 80, '74f25cecaf0bcbf9abd98047d36cd0223c4ef3a8', 'TUPI/ADU/PRU/PRUL', 'position', 1, 1625492313),
(55, 'Legal Counsel', 'LEC', 'BOT', 87, 'a408d549177f35e53e6d946319ba34404b57e8d1', 'TUPI/BOT/LEC', 'position', 1, 1625492410),
(56, 'Volunteering', 'VOL', 'OTU', 50, '8659b5f64eb238e5f8479c2e950aa807e74e6942', 'TUPI/ADU/OTU/VOL', 'position', 100, 1625492463),
(57, 'Dean Of School Of Self', 'DSS', 'SCS', 79, 'c3800323b5eb203b45deb3ffc73597f6f5d886d1', 'TUPI/ADU/TRU/UNY/SCS/DSS', 'position', 1, 1625492520),
(58, 'Deputy Dean School Of Self', 'DDS', 'SCS', 78, '2b2eb27d9c6808a345d4424d9beb9471e24ae49d', 'TUPI/ADU/TRU/UNY/SCS/DDS', 'position', 1, 1625492559),
(59, 'Dean Of School Of Leadership', 'DSL', 'SCL', 79, 'c8a453880e1cdaf019d081a523a11e989539c307', 'TUPI/ADU/TRU/UNY/SCL/DSL', 'position', 1, 1625492604),
(60, 'Deputy Dean School Of Leadership', 'DDL', 'SCL', 78, '568bc9d7709212fbf0c2c46e0cd783324db7d3b6', 'TUPI/ADU/TRU/UNY/SCL/DDL', 'position', 1, 1625492638),
(66, 'Board Member', 'BOM', 'BOT', 86, '92a963fb8f1cac16d943c7512dd7c7d9a472f242', 'TUPI/BOT/BOM', 'position', 100, 1628542469),
(67, 'Chairman', 'CHMAN', 'TUPI', 90, 'c587ca0c28b81332ec44a26340605acc8bac1d98', 'TUPI/CHMAN', 'position', 6, 1630798412),
(68, 'Managing Director', 'MD', 'BOT', 88, '5f2fccd39df9e1e8b567fd582d718d7e825493d7', 'TUPI/BOT/MD', 'position', 10, 1637756548);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `hash_key` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `organisation` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `position_main` varchar(255) DEFAULT NULL,
  `position_other` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT 'https://facebook.com/',
  `twitter` varchar(255) DEFAULT 'https://twitter.com/',
  `instagram` varchar(255) DEFAULT 'https://instagram.com/',
  `linkedin` varchar(255) DEFAULT 'https://linkedin.com/',
  `date_added` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `title`, `fullname`, `hash_key`, `description`, `organisation`, `rank`, `position_main`, `position_other`, `email`, `sex`, `photo`, `photo_thumb`, `facebook`, `twitter`, `instagram`, `linkedin`, `date_added`) VALUES
(1, 'Pst.', 'Bisi Akande', 'a33f74cb1f65d1e31d10d838ce7328f4aecec128', '<b></b>', 'Yes', NULL, 'Chairman', 'None', 'bisiakande@gmail.com', 'Male', 'Bisi_Akande.jpg', 'Bisi_Akande_thumb.jpg', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 1630798432),
(2, 'Mrs.', 'Bola Adebanjo', 'ec4171673c53b705deb081fbdbcc2648f8605e62', 'Principal Partner at Bolton Solicitors. A graduate of the prestigious University of Ibadan. Extensive experience in Corporate/Commercial and Company Secretarial Practice and civil litigation.', 'Yes', NULL, 'Board Member', 'None', 'noreply@gmail.com', 'Female', 'Bola_Adebanjo.jpeg', 'Bola_Adebanjo_thumb.jpeg', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 1631104991),
(3, 'Mrs.', 'Grace Onifade', '36c56fd75a105827e11a36c5bd3c6cb17c248f5b', 'An experienced educationist  with over 30 years experience in the education sector.  As a currently-retired secondary school Principal, her years of work in the secondary school has exposed her to youth behavior and challenges they face today. She is will', 'Yes', NULL, 'Board Member', 'None', 'noreply1@gmail.com', 'Female', 'Grace_Onifade.jpeg', 'Grace_Onifade_thumb.jpeg', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 1631105134),
(4, 'Mr.', 'Osebi Ibrahim', '26ac39056c065a49876830e18e1656bf2d4b5fa8', '<b></b>', 'Yes', NULL, 'Board Member', 'None', 'no@gmail.com', 'Male', 'Osebi_Ibrahim.jpeg', 'Osebi_Ibrahim_thumb.jpeg', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 1630701421),
(5, 'Mrs.', 'Gloria A. Ajoge-Adaba', '77fe021f05b1cdda1030013a72b85e46b44e8aa1', 'founder of Thumbs Up Youth leadership Development Initiative; a non-profit organization focused on helping young people discover their potiential and deliberately lead themselves and others in fulfilling their life’s purposes.\r\nShe is a personal developme', 'Yes', NULL, 'Founder', 'None', 'nomail@gmail.com', 'Female', 'Gloria_A__Ajoge-Adaba.jpeg', 'Gloria_A__Ajoge-Adaba_thumb.jpeg', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 1631745920),
(6, 'Mrs.', 'Abiola Rashidat Daodu', 'abe65de38faf9211e0fe00feba2d5f90ebdcd77f', '', 'Yes', NULL, 'Managing Director', 'BOM', 'notavailaible@gmail.com', 'Female', 'Abiola_Rashidat_Daodu.jpg', 'Abiola_Rashidat_Daodu_thumb.jpg', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 1637768209),
(7, 'Miss', 'Onyinyechi Ekumankama', '883de72958b6b1b5226b304788009424c30b918b', 'Radio and television presenter', 'No', NULL, '', NULL, 'noreply@yahooo.com', 'Female', 'Onyinyechi_Ekumankama.jpg', 'Onyinyechi_Ekumankama_thumb.jpg', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 1631746460),
(8, 'Mrs.', 'Adenike Oyetunde-Lawal', '5f7e014d32ddb2a963fa8d43564d03b45bfa7d3e', 'Disability Advoccate', 'No', NULL, '', NULL, 'b@gmail.com', 'Female', 'Adenike_Oyetunde-Lawal.jpg', 'Adenike_Oyetunde-Lawal_thumb.jpg', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 1631746695),
(9, 'Mr.', 'Olusoji Oyawoye', '4d27bc3cacb07bd9ecd6a4515e16bd471199a4ea', 'Life and Business Coach. Co-founder and MD/CEO of Resource Intermediaries Limited', 'No', NULL, '', NULL, 'a@gmail.com', 'Male', 'Olusoji_Oyawoye.jpg', 'Olusoji_Oyawoye_thumb.jpg', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 1631746840);

-- --------------------------------------------------------

--
-- Table structure for table `school_stats`
--

CREATE TABLE `school_stats` (
  `id` int(11) NOT NULL,
  `students` int(11) NOT NULL,
  `classes` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `teachers` int(11) NOT NULL,
  `school_buses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `school_stats`
--

INSERT INTO `school_stats` (`id`, `students`, `classes`, `staff`, `teachers`, `school_buses`) VALUES
(1, 467, 10, 29, 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `published` varchar(50) NOT NULL DEFAULT 'false',
  `date_added` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `residential_address` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `active` varchar(10) NOT NULL DEFAULT 'true',
  `quote` varchar(255) DEFAULT NULL,
  `facebook_handle` varchar(255) DEFAULT 'https://facebook.com/',
  `twitter_handle` varchar(255) DEFAULT 'https://twitter.com/',
  `instagram_handle` varchar(255) DEFAULT 'https://instagram.com/',
  `linkedin_handle` varchar(255) DEFAULT 'https://linkedin.com/',
  `classes_assigned` varchar(1000) DEFAULT NULL,
  `subjects_assigned` varchar(1000) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `phone`, `designation`, `date_of_birth`, `sex`, `residential_address`, `additional_info`, `photo`, `photo_thumb`, `active`, `quote`, `facebook_handle`, `twitter_handle`, `instagram_handle`, `linkedin_handle`, `classes_assigned`, `subjects_assigned`, `date_added`, `last_login`) VALUES
(149, 'Eyibio Susan', 'eyibiosusan@topclass.com', '0908796858', 'Class Teacher', '1999/04/11', 'Female', 'Topclass', '', 'Eyibio_Susan.png', 'Eyibio_Susan_thumb.png', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 2', 'Teacher', '2018-12-02 23:08:51', NULL),
(150, 'Jenny Usani', 'jennyusani@topclass.com', '093553343545', 'Class Teacher', '1990/11/07', 'Female', 'Topclass', '', 'Jenny_Usani.jpg', 'Jenny_Usani_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Pine Class', 'Pine Class', '2018-12-02 23:21:51', NULL),
(151, 'Great S. Oko', 'great@topclass.com', '0908796858', 'Class Teacher', '1992/04/10', 'Male', 'Topclass', '', 'Great_S__Oko.jpg', 'Great_S__Oko_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 3', 'Composition And Verbal Reasoning', '2018-12-02 23:28:09', NULL),
(152, 'Micaiah Ita', 'micaiahita@topclass.com', '07033085090', 'Class Teacher', '2000/12/28', 'Female', 'Topclass', '', 'Micaiah_Ita.jpg', 'Micaiah_Ita_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 1', '(Lady Bird \"E\"', '2018-12-02 23:50:10', NULL),
(153, 'Mfon Akpan', 'mfonakpan@topclass.com', '09037383863', 'Class Teacher', '2018/01/02', 'Female', 'Topclass', '', 'Mfon_Akpa.jpg', 'Mfon_Akpa_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Pine Class', 'Pine Class', '2018-12-02 23:50:20', NULL),
(154, 'Uket Agnes', 'uketagnes@topclass.com', '07033085090', 'Class Teacher', '1992/10/14', 'Female', 'Topclass', '', 'Uket_Agnes.jpg', 'Uket_Agnes_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary  3', 'Visual And Cultural Arts', '2018-12-03 00:06:25', NULL),
(155, 'Utibe Ikpe', 'utibeikpe@topclass.com', '09035725267', 'Class Teacher', '1999/05/17', 'Female', 'Topclass', '', 'Utibe_Ikpe.jpg', 'Utibe_Ikpe_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 1', 'Teacher', '2018-12-03 00:06:44', NULL),
(156, 'Monica Ushanu', 'monicaushanu@topclass.com', '0908796858', 'Class Teacher', '1994/03/31', 'Female', 'Topclass', '', 'monica_shanu.jpg', 'monica_shanu_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 3', 'Teacher', '2018-12-03 02:13:18', NULL),
(157, 'Victor Percy', 'victorpercy@topclass.com', '0908796858', 'Class Teacher', '1992/08/17', 'Male', 'Topclass', '', 'victor_Percy.jpg', 'victor_Percy_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary', 'Maths And Quantitative Reasoning', '2018-12-03 02:13:37', NULL),
(158, 'Wakama I. Elliot', 'wakama@topclass.com', '093553343545', 'Class Teacher', '1990/05/23', 'Male', 'Topclass', '', 'Wakama_elliot.jpg', 'Wakama_elliot_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 2', 'Vocational Aptitude And Computer Studies', '2018-12-03 02:21:50', NULL),
(159, 'Esther Linus', 'esther_linus@topclass.com', '0908796858', 'Class Teacher', '1995/07/19', 'Female', 'Topclass', '', 'esther_inus.jpg', 'esther_inus_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 1', '(Lady Bird \"E\")', '2018-12-03 02:31:07', NULL),
(160, 'Grace Ukper', 'grace_ukper@topclass.com', '0908796858', 'Class Assistant', '1994/10/19', 'Female', 'Topclass.com', '', 'grace_ukper.jpg', 'grace_ukper_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Pine Class', 'Pine Class', '2018-12-03 02:31:18', NULL),
(161, 'Mercy Victor', 'mercy_victor@topclass.com', '0908796858', 'Class Teacher', '1989/06/01', 'Female', 'Topclass', '', 'mercy_victor.jpg', 'mercy_victor_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 5', 'Mathematics', '2018-12-03 02:43:03', NULL),
(162, 'Grace Ante', 'grace_nte@topclass.com', '0908796858', 'Class Teacher', '1995/11/23', 'Female', 'Topclass', '', 'grace_ante.jpg', 'grace_ante_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 1', 'Teacher', '2018-12-03 02:43:17', NULL),
(163, 'Ntekim Ntekim', 'ntekimntekim@topclass.com', '09035725267', 'Class Teacher', '1994/10/27', 'Male', 'Topclass', '', 'ntekim_ntekim.jpg', 'ntekim_ntekim_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary  2', 'Pysical Education And C.R.K', '2018-12-03 02:53:44', NULL),
(164, 'Nsaka Magaret', 'nsakaagaret@topclass.com', '0908796858', 'Class Teacher', '1999/10/08', 'Female', 'Topclass.', '', 'IMG_20181115_161516.jpg', 'IMG_20181115_161516_thumb.jpg', 'true', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 1', '(lady Bird \"N\")', '2018-12-03 02:53:54', NULL),
(165, 'Oka Anthonia', 'okaanthonia@topclass.com', '07033085090', 'Class Assistant', '2001/03/06', 'Female', 'Topclass', '', 'IMG_20190826_205954.jpg', 'IMG_20190826_205954_thumb.jpg', 'true', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 1', 'Teacher', '2018-12-03 03:03:11', NULL),
(167, 'Otu Elizabeth', 'otu_elizabeth@topclass.com', '09035725267', 'Class Teacher', '1991/10/29', 'Female', 'Topclass', '', 'IMG_20180817_062021.jpg', 'IMG_20180817_062021_thumb.jpg', 'true', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 3', 'Teacher', '2018-12-03 03:13:50', NULL),
(168, 'Sandra Orioha', 'sandra_orioha@topclass.com', '07033085090', 'Class Teacher', '1994/11/30', 'Female', 'Topclass', '', 'IMG_20170821_204927.jpg', 'IMG_20170821_204927_thumb.jpg', 'true', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 2', 'Comprehensive And English Language', '2018-12-03 03:14:03', NULL),
(169, 'Ukpong Janet', 'ukpong_janet@topclass.com', '07033085090', 'Class Teacher', '1994/10/19', 'Female', 'Topclass', '', '1395020714468.jpg', '1395020714468_thumb.jpg', 'true', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 1', 'Teacher', '2018-12-03 03:39:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `testimony` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `date` int(50) DEFAULT NULL,
  `published` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(990) DEFAULT NULL,
  `published` varchar(50) NOT NULL,
  `date_added` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `description`, `published`, `date_added`) VALUES
(6, 'Outreach Unit', '<p><strong>Responsible for External Public Activities, Events and Programs</strong></p>\r\n      <ul>\r\n       <li>Charity visits</li><br>\r\n     <li>Social media live chats and videos.</li><br>\r\n     <li>Volunteering.</li><br>\r\n     <li>Institutional Partnerships: School Adoptions, individual and groups</li>\r\n      </ul>', 'true', 1627811959),
(7, 'Media Unit', '<p><strong>Officially Responsible for TUPI contents and Content Development; Handles Coverage and Recording, Documentations, Media, Multi-Media, Info-tech and Internet and any other media related based activities/exercises of TUPI.</strong></p>', 'true', 1627593232),
(8, 'Business Unit', '<p><b>Officially responsible for all business activities and exercises of TUPI and responsible for working with the R&D team in getting grants for TUPI</b></p>', 'true', 1627593284),
(9, 'Research And Development Unit', '<p><strong>Handles knowledge-based data/resources that attract funding, and projects that magnifies TUPI</strong></p>', 'true', 1627593327),
(10, 'Finance Unit', '<p><strong>Takes and Keeps financial records of TUPI. Release and Regulates funds to various teams for TUPI activities</strong></p>', 'true', 1627593407),
(13, 'Training Unit', '<p><strong>Responsible for all Formal and Informal Grooming/Training in line with TUPI</strong></p>\r\n      <ul><li>University of YOU (School of Leadership and Self Development)</li><li>Business and Financial Academy/University (Grooming of Business Modules/Financial Grooming)</li><li>Institutional Partnerships: School Adoptions, individual and group </li><br><li>Passive learning (Cartoons, drama skits, entertaining learning, etc.)</li></ul>\r\n\r\n    <p><strong>Extra-Curricular</strong></p>\r\n    <ul><li>Sports</li><li>Competitions</li><li>Skill Acquisition</li><li>Dance</li><li>Martial Art etc.</li></ul>', 'true', 1627609689),
(14, 'Public Relation And Welfare Unit', '<p><b>Takes record of all minutes in central meetings</b></p>\r\n<ul>\r\n <li>Collates reports from Unit Heads/Secretaries</li><br>\r\n <li>Collates the report/record of financial activities, exercise and needs of Units</li><br>\r\n <li>Makes financial provision for Units, Central Activities, Events and Programs.</li><br>\r\n <li>Coordinates and assists the set up for TUPI activities</li><br>\r\n <li>Coordinates the activities of TUPI; Meetings, Event, Units, Time, Contents and Floor Management (flow of Meeting).</li><br>\r\n <li>Manges Quality Control of the Image and reputation of TUPI internally and publicly</li><br>\r\n <li>Works closely with the Admin team to drive the decisions and plans of the central goal.</li><br>\r\n</ul>', 'true', 1627763753);

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `residence` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `m_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `r_phone` varchar(255) DEFAULT NULL,
  `r_email` varchar(255) DEFAULT NULL,
  `place_of_employment` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `office_phone` varchar(255) DEFAULT NULL,
  `date_added` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `name`, `address`, `state`, `residence`, `phone`, `email`, `availability`, `qualification`, `language`, `f_name`, `m_name`, `l_name`, `r_phone`, `r_email`, `place_of_employment`, `position`, `office_phone`, `date_added`) VALUES
(6, 'Edun Omowunmi Bidemi ', 'No14b Remi Sennaike Close\r\nOjuolape Estate \r\nOlaniyi Abule egba \r\nLagos ', 'Lagos', 'Lagos', '08060161708', 'wumi4mp@gmail.com', '2023-09-16', 'Degree, Other', 'English, Yoruba, Hausa', 'Kemisola', 'Salawu', 'Alabi', '07019199783', 'kemiwd3@gmail.com', 'Rivergate model academy ', 'School Head', 'Same as above', 1694006146);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_structure`
--
ALTER TABLE `org_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_stats`
--
ALTER TABLE `school_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `org_structure`
--
ALTER TABLE `org_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `school_stats`
--
ALTER TABLE `school_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
