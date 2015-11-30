<style>
	.modalDialog {position:fixed; top:0; right:0; bottom:0; left:0; background:rgba(0,0,0,0.8); z-index:99999; opacity:0; transition:opacity 100ms ease-in; pointer-events:none}
	.modalDialog:target {opacity:1; pointer-events:auto}
	.modalDialog > div {width:400px; position:relative; margin:10% auto; padding:5px 20px 13px 20px; border-radius:10px; background:#fff; background:linear-gradient(to bottom, #fff, #999)}
	.close {background:#606061; color:#FFFFFF; line-height:25px; position:absolute; right:-12px; text-align:center; top:-10px; width:24px; text-decoration:none; font-weight:bold; border-radius:12px; box-shadow:1px 1px 3px #000}
	.close:hover { background:#00d9ff}
</style>

<article>
	<a href="#openModal">Open Modal</a>
	<div id="openModal" class="modalDialog">
		<div>
			<a href="#close" title="Close" class="close">X</a>
			<h2>Modal Box</h2>
			<p>This is a sample modal box that can be created using the powers of CSS3.</p>
			<p>You could do a lot of things here like have a pop-up ad that shows when your website loads, or create a login/register form for users.</p>
		</div>
	</div>
</article>