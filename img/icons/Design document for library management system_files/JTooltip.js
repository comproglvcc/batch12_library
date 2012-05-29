var ToolTipDock = {
	top: 1,
	left: 2,
	bottom: 4,
	right: 8
};

var DefaultExplainTooltipTexts = {
Credits: { title: "Credits", text: "Docstoc currency given to Premium Members to 1.) Download 10,000+ Premium Documents valued at $20 each and 2.) Download of 100+ <a style=\"vertical-align:baseline;text-decoration:underline\" href=\"http://www.docstoc.com/packages/browsepackages/\">Premium Packages</a> valued over $75 each", ico: "R0lGODlhEAAQALMAAI+msrHDyvT3+Nni5qm8xb3M0tPd4snV2sTR1s7Z3uTr7sDP07nI0KC0v5Sqt////yH5BAAAAAAALAAAAAAQABAAAASRcLDmqr2NyUZ6+GDQZU1QFEiSGIaKnAHFFAdrDHh7LEzFIAdGh2BQ4BLBCo0AADQAB4FC0SpUeE6DVHCINRKLCoJZEAgejwDA0TAgxEyEGc0ABFhvB0JNUMzVCFRhDgULTyVtdQsDCVYODAcFBBSJhAZJjwsHKgk5Kjs9JYWbNjoLBTETHgwzJ6wiGRsXs2waEQA7" },
DocstocPremium: { title: "Docstoc Premium", text: "10,000+ premium small business documents accessible with <a style=\"vertical-align:baseline;text-decoration:underline\" href=\"https://www.docstoc.com/pass\">Docstoc Premium Membership</a> or for sales", ico: "R0lGODlhEAAQALMAAL3M0qq9xu/z9bLDy9Pd4cnV2sTR1pqvu9/m6tni5sDO1M7Z3tbg5LnI0KC0v5SqtyH5BAAAAAAALAAAAAAQABAAAASKkDX3qr2uSRf6+GAXZBlgLAvBMMRSKM34NEbBJEiOJMQbVICGxbFQWAKGQcUAeASUs8fg8IAtjQBBwcL4Ba+PLOLyOCyaDwNWYChLFS20oik7NAmIHvpbCSSaCwwLBkIzCgUqOgmCBXwDAIcpBJODMEocTw0KNQUFag0DIxMeDQ0Ap6WhGRtkZKsRADs=" },
	EliteDocuments : {title: "Elite Documents", text: "Community voted as the most popular documents"},
	PartnerDocuments: { title: "Partner Documents", text: "Over a Million documents available for sale in the <a style=\"vertical-align:baseline;text-decoration:underline\" href=\"http://www.docstoc.com/store\">DocStore</a> from over 60+ trusted partners.", ico: "R0lGODlhEAAQALMAAI6ls7TEzL3M0qm7xdzk6NTe4s7Z3srV2sbT2MPQ1r/O0/L19q7AyLnI0KC0v5SqtyH5BAAAAAAALAAAAAAQABAAAASWsDT3qr2uSTdYD2DAjEPmBIKAHIZRtIgiMFSjHAWh7wUiBBVbI6DQ+QQsRKOiAAIADMET8GAYBMylYukAaAZeRSWxHD7Ah0XhjBgvH94DwKBmux8BghqQWDDCTAF8CwsJAA5dDgdYDw0NAwl6BgOUDQcHbzYILjk6BQUHTQ8ODAoKm5wwMjQTHwENKQJDASUaExe4oxoRADs=" },
	DocumentLibrary: { title: "Document Library", text: "20 Million+ professional documents available for download and print with <a style=\"vertical-align:baseline;text-decoration:underline\" href=\"https://www.docstoc.com/pass\">Docstoc Premium Membership</a>", ico: "R0lGODlhEAAQALMAANrj56q8xbXGzY+mtL3M0eLp7MrW2tLc4MTR1sDO1PP298/a3rHDyrnI0KC0v5SqtyH5BAAAAAAALAAAAAAQABAAAASQEDT3qr2uSRc6+yDTZQ5DEIixHMdiIAnBUEJiHABQ6IBLCJUGQtAgJHQJRMvQqBAMj4HUcXg4coZEJbF4BAqIQcC6O2gfiWpAoQhIv4UDoqL0st3iQnyO7n4XYl45C2dPFgNUUVYNZ0IiDBoFDR8BJ0FPCzk7OQdZTSVGKiwsLggyJB5EJwQNAiIZGxeyiwARADs=" },
	FreeDocuments: { title: "Free Documents", text: "Documents available to download and print with a free basic Docstoc account" ,ico:"R0lGODlhEAAQALMAAKq8xrLDy9ri57zL0dPd4cTR1pmuu8jV2c7Z3evw8vL197/O0+Ho67nI0KC0v5SqtyH5BAAAAAAALAAAAAAQABAAAASGUDT3qr2uSQd6+GDQZdmwHAihEghSLNPTnIggMIzNvtUwcJxGpzNwVRaDh8GjBBgegEOlkAQkFAwo9rmYdpcAhDYReCQfPLAYoEgAzNPqVaAlTI9VRoJuoMikZgMBAzcCQwEHBwUVDQMoBDaRO0kOATMFjyoIigMTEx4NjT6hIhkbF6gPphEAOw=="}
};

var ___hidetooltip = 0;

(function($) {
	$j.fn.explainTooltip = function(op) {
		op = $j.extend({
			smooth: true,
			dock: ToolTipDock.top,
			html: "<div style=\"max-width:370px;text-align:center;position:relative;\"><h4 style=\"line-height:21px;-moz-border-radius:8px 8px 0 0;border-radius:8px 8px 0 0;-moz-box-shadow:0 1px 2px #CCC;-webkit-box-shadow:0 1px 2px #CCC;box-shadow:0 1px 2px #CCC;background:#dee6ea;border:1px solid #9fb3c0;border-bottom:none;text-align:left;font-size:12px;color:#1c5b8e;font-weight:bold;padding:10px 10px 0;margin:0\">" + op.title + "</h4>" +
				  "<p style=\"line-height:21px;-moz-border-radius:0 0 8px 8px;border-radius:0 0 8px 8px;-moz-box-shadow:0 1px 2px #CCC;-webkit-box-shadow:0 1px 2px #CCC;box-shadow:0 1px 2px #CCC;background:#dee6ea;border:1px solid #9fb3c0;border-top:none;text-align:left;font-size:12px;color:#1c5b8e;font-weight:normal;padding:5px 10px 10px;margin:0;min-width:200px\">" + op.text + "</p>" +
				  ((op.ico) ? "<img style=\"position:absolute;top:5px;right:5px;\" src=\"data:image/gif;base64," + op.ico + "\"/>" : "") +
				  "<img style=\"vertical-align:top;margin-top:-1px;min-width:1px\" src=\"data:image/png;base64,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\"/></div>"
		}, op);
		return $(this).tooltip(op);
	}
	$j.fn.tooltip = function(op) {
		var ttwrp = $j("<div class=\"eyfttwrp\"></div>");

		op = $j.extend({ dock: ToolTipDock.bottom | ToolTipDock.right,
			open: function() { }, close: function() { },
			beforeOpen: function() { }, beforeClose: function() { },
			padding: "0"
		}, op);

		ttwrp.append(op.html || "");

		op.html = ttwrp;
		var o = op;

		$j(this).mouseover(function() {
			clearInterval(___hidetooltip);
			o.beforeOpen.call(this, o);
			o.callback = o.open;
			$j(this).openTooltip(o);
		}).mouseout(function() {
			clearInterval(___hidetooltip);
			___hidetooltip = setInterval(function() {
				if ($j("#eyftt").hasClass("ovr")) return;
				clearInterval(___hidetooltip);
				o.beforeClose.call(this, o);
				o.callback = o.close;
				$j(this).closeTooltip(o);
			}, 250);
		});
	};
	$j.fn.openTooltip = function(op) {
		op = $j.extend({ dock: ToolTipDock.bottom | ToolTipDock.left,
			callback: function() { },
			html: "<div></div>"
		}, op);
		if ($j("#eyftt").length == 0) {
			$j("body").append("<div id=\"eyftt\" style=\"position:fixed;z-index:4000\"></div>");
			$j("#eyftt").hover(function() { if ($j(this).hasClass("ovr")) return; $j(this).addClass("ovr") }, function() { $j(this).removeClass("ovr"); });
		}
		var ttip = $j("#eyftt");
		ttip.css({ top: "-1000px", left: 0, padding: (op.padding) ? op.padding : "0px" }).show().html(op.html);
		var tt = { h: ttip.outerHeight(true), w: ttip.outerWidth(true) };
		var of = $j(this).offset();
		of.top += ($j(this).outerHeight(true) / 2) - (tt.h / 2);
		of.left += ($j(this).outerWidth(true) / 2) - (tt.w / 2);
		if (((op.dock & ToolTipDock.bottom) == ToolTipDock.bottom))
			of.top = $j(this).offset().top + $j(this).outerHeight(true);
		else if (((op.dock & ToolTipDock.top) == ToolTipDock.top))
			of.top = $j(this).offset().top - tt.h;
		if (((op.dock & ToolTipDock.left) == ToolTipDock.left))
			of.left = ($j(this).offset().left - (((op.dock & ToolTipDock.top) != ToolTipDock.top && (op.dock & ToolTipDock.bottom) != ToolTipDock.bottom) ? tt.w : 0));
		else if (((op.dock & ToolTipDock.right) == ToolTipDock.right))
			of.left = (($j(this).offset().left + $j(this).outerWidth(true)) - (((op.dock & ToolTipDock.top) != ToolTipDock.top && (op.dock & ToolTipDock.bottom) != ToolTipDock.bottom) ? 0 : tt.w));
		ttip.hide().css({ "top": of.top - $j(window).scrollTop(), "left": of.left - $j(window).scrollLeft() });
		if (op.smooth) ttip.fadeIn("fast");
		else ttip.show();
		op.callback.call(this, ttip);
		return this;
	};
	$j.fn.closeTooltip = function(op) {
		op = $j.extend({ callback: function() { } }, op);
		if (op.smooth) $j("#eyftt").fadeOut(120, function() { $j(this).html("").css({ top: "-1000px" }); });
		else $j("#eyftt").html("").css({ top: "-1000px" });
		op.callback.call(this);
		return this;
	};
})(jQuery);