@layout('templates.main')
@section('content')
<div id="subheader">
	
	<div class="inner">
		
		<div class="container">
					
			<h1>Frequently Asked Questions</h1>
		
		</div> <!-- /.container -->
		
	</div> <!-- /inner -->
	
</div> <!-- /subheader -->


 
<div id="subpage">	
	
	<div class="container">
		
		<div class="row">
			
			<div class="span8">					
					
					<h3><span class="slash">//</span> Search...</h3>
					
					
					
					
					
					<ol class="faq-list">
						
						<li>
								<h4>How can I get my own domain name?</h4>
								<p>The Internet Corporation for Assigned Names and Numbers (ICANN) maintains a list of accredited registrars . Any of the companies on this list can register a domain name for you..</p>	
								
						</li>
						
						<li>
								<h4>How can I block my hosting service's advertisements?</h4>
								<p>Check the Terms of Service (TOS) agreement for your hosting service. It almost certainly prohibits interfering with the advertisements they add to your web pages. If you use some trick to block their advertisements on your own, then your hosting service may delete your account for violating its TOS.</p>	
								
						</li>
						
						<li>
							
								<h4>How do I redirect someone to another page?</h4>
								<p>The most reliable way is to configure the server to send out a redirection instruction when the old URL is requested. Then the browser will automatically get the new URL. This is the fastest and most efficient way, and is the only way described here that can convince indexing robots to phase out the old URL. For configuration details consult your server admin or documentation (with NCSA or Apache servers, use a Redirect statement in .htaccess).</p>	
								<p>If you can't set up a redirect, there are other possibilities. These are inferior because they tell the search engines that there's still a page at the old location, not that the page has moved to a new location. But if it's impossible for you to configure redirection at your server, here are two alternatives:</p>	
						</li>
						
						<li>
								<h4>How do I password protect my web site?</h4>
								<p>Password protection is done through HTTP authentication. The configuration details vary from server to server, so you should read the authentication section of your server documentation. Contact your server administrator if you need help with this.</p>	
								<p>JavaScript password scripts provide only a facade of security. At a fundamental level, they work in one of two ways. Some scripts convert the password into a URL, which keeps the document secret by limiting the number of people who know its URL. Some scripts check the password and then go to a specific URL, which protects the document only from those who don't view the JavaScript source to get the URL of the document. Neither mechanism is really secure.</p>	
								
						</li>
						
						<li>
							
								<h4>How do I stop my page from being cached?</h4>
								<p>Browsers cache web documents; they store local copies of documents to speed up repeated references to documents that haven't changed. Also, many browsers are configured to use public proxy caches, which serve many users (e.g., all customers of an ISP, or all employees behind a corporate firewall). To effectively control how your documents are cached you must configure your server to send appropriate HTTP headers.</p>	
								<p>The Expires header is understood by virtually all caches. The cached document will be retrieved again automatically once it has expired. The Expires header must contain an HTTP date, which must be Greenwich Mean Time (GMT), not local time.</p>	
								
						</li>
						
						<li>
								<h4>How can I disable the browser's right-click options?</h4>
								<p>These scripts annoy visitors who lose ready access to their browsers' normal context-menu functions (e.g., "Open in new window" or "Bookmark link"). These scripts can also interfere with features like mouse gestures.
Nothing (including these scripts) can prevent anyone from copying your source or images. The browser cannot display your document without the source and images, so your web server must send them to the browser. Even without the various "save" functions in today's browsers, someone can retrieve your source or images from the browser's cache, request them from the server with some other tool, or use a screen-capture tool to copy the images.
These scripts do nothing when JavaScript is disabled or unavailable, when JavaScript access to right-click events is disabled, on systems without mice, or on systems with single-button mice.</p>	
								
						</li>
						
						<li>
							
								<h4>How do I hide my URL?</h4>
								<p>You can't. URLs are fundamental to navigation on the WWW. The URL is necessary for the browser to be able to retrieve your document. It is impossible to hide the URL of a resource from the browser.</p>	
								
						</li>
						
						<li>
							
								<h4>How do I detect what browser is being used?</h4>
								<p>Many browsers identify themselves when they request a document. A CGI script will have this information available in the HTTP_USER_AGENT environment variable, and it can use that to send out a version of the document which is optimized for that browser.</p>	
								<p>Keep in mind not all browsers identify themselves correctly. For example, Microsoft Internet Explorer identifies itself as Netscape Navigator, and many other browsers identify themselves as Microsoft Internet Explorer.</p>	
								<p>And of course, if a cache proxy keeps a version intended for one brower, someone with another browser may get that version, rather than the version intended for the other browser.</p>	
								
						</li>
						
						<li>
							
								<h4>How do I get my visitors' email addresses?</h4>
								<p>You can't. Although each request for a document is usually logged with the name or address of the remote host, the actual username is almost never logged as well. This is mostly because of performance reasons, as it would require that the server uses the ident protocol to see who is on the other end. This takes time. And if a cache proxy is doing the request, you don't get anything sensible.</p>	
								<p>But just stop to think for a minute... would you really want every single site you visit to know your email address? Imagine the loads of automated thank you's you would be receiving. If you visited 20 sites, you would get at least 20 emails that day, plus no doubt they would send you invitations to return later. It would be a nightmare as well as an invasion of privacy!</p>	
								
						</li>
						
						<li>
								<h4>Why is my custom 404 Not Found message not displayed?</h4>
								<p>If only Internet Explorer ignores your custom 404 Not Found messages, then you've been caught by its "friendly" HTTP error messages. When a special HTTP response (e.g., a 404 Not Found response) is shorter than 512 bytes, Internet Explorer substitutes its own message for the one delivered by the server. As a user of Internet Explorer, you can disable this feature in the "Advanced" options panel. As a web author, your only recourse is to make your 404 Not Found message longer.</p>	
								
						</li>
						
						
						
					</ol>
					
				
			</div> <!-- /span8 -->
			
			<div class="span4">
					
				<div class="sidebar">
					
					<h3><span class="slash">//</span> More Information</h3>
					
					
					
					
					<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					
				</div> <!-- /sidebar -->
				
			</div> <!-- /span4 -->
		</div> <!-- /row -->
		
	</div> <!-- /container -->	
	
</div> <!-- /subpage -->   
    


@endsection