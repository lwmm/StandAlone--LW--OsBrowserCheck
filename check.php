<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" ></script>
<script>
    var BrowserDetect = {
	init: function () {
		this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		this.version = this.searchVersion(navigator.userAgent)
			|| this.searchVersion(navigator.appVersion)
			|| "an unknown version";
		this.OS = this.searchString(this.dataOS) || "an unknown OS";
        this.lang = navigator.language;
	},
	searchString: function (data) {
		for (var i=0;i<data.length;i++)	{
			var dataString = data[i].string;
			var dataProp = data[i].prop;
			this.versionSearchString = data[i].versionSearch || data[i].identity;
			if (dataString) {
				if (dataString.indexOf(data[i].subString) !== -1)
					return data[i].identity;
			}
			else if (dataProp)
				return data[i].identity;
		}
	},
	searchVersion: function (dataString) {
		var index = dataString.indexOf(this.versionSearchString);
		if (index === -1) return;
		return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
	},
	dataBrowser: [
		{
			string: navigator.userAgent,
			subString: "Chrome",
			identity: "Chrome"
		},
		{ 	string: navigator.userAgent,
			subString: "OmniWeb",
			versionSearch: "OmniWeb/",
			identity: "OmniWeb"
		},
		{
			string: navigator.vendor,
			subString: "Apple",
			identity: "Safari",
			versionSearch: "Version"
		},
		{
			prop: window.opera,
			identity: "Opera",
			versionSearch: "Version"
		},
		{
			string: navigator.vendor,
			subString: "iCab",
			identity: "iCab"
		},
		{
			string: navigator.vendor,
			subString: "KDE",
			identity: "Konqueror"
		},
		{
			string: navigator.userAgent,
			subString: "Firefox",
			identity: "Firefox"
		},
		{
			string: navigator.vendor,
			subString: "Camino",
			identity: "Camino"
		},
		{		// for newer Netscapes (6+)
			string: navigator.userAgent,
			subString: "Netscape",
			identity: "Netscape"
		},
		{
			string: navigator.userAgent,
			subString: "MSIE",
			identity: "Explorer",
			versionSearch: "MSIE"
		},
		{
			string: navigator.userAgent,
			subString: "Gecko",
			identity: "Mozilla",
			versionSearch: "rv"
		},
		{ 		// for older Netscapes (4-)
			string: navigator.userAgent,
			subString: "Mozilla",
			identity: "Netscape",
			versionSearch: "Mozilla"
		}
	],
	dataOS : [
		{
			string: navigator.platform,
			subString: "Win",
			identity: "Windows"
		},
		{
			string: navigator.platform,
			subString: "Mac",
			identity: "Mac"
		},
		{
			   string: navigator.userAgent,
			   subString: "iPhone",
			   identity: "iPhone/iPod"
	    },
		{
			string: navigator.platform,
			subString: "Linux",
			identity: "Linux"
		}
	]

};
BrowserDetect.init();
var jsver=-1;

var num_of_plugins = navigator.plugins.length;
var pluginlist = '';

for (var i=0; i < num_of_plugins; i++) {
    pluginlist +=  navigator.plugins[i].name + ', ';
}
var temp = '';
temp = pluginlist.substr(0,pluginlist.length - 2); 
pluginlist = temp;
</script>
<script language="javascript1.1">jsver=1.1;</script>

<script language="javascript1.2">jsver=1.2;</script>

<script language="javascript1.3">jsver=1.3;</script>

<script language="javascript1.4">jsver=1.4;</script>

<script language="javascript1.5">jsver=1.5;</script>

<script language="javascript1.6">jsver=1.6;</script>

<script language="javascript1.7">jsver=1.7;</script>

<script language="javascript1.8">jsver=1.8;</script>

<script language="javascript1.9">jsver=1.9;</script>

<script language="javascript2.0">jsver=2.0;</script>

<script language="javascript2.1">jsver=2.1;</script>

<div id="tableContainer" style="max-width: 400px;">
    <table border="1">
        <thead>
            <tr>
                <th>Parameter</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Browser</td>
                <td id="browser">???</td>
            </tr>
            <tr>
                <td>Version</td>
                <td id="version">???</td>
            </tr>
            <tr>
                <td>OS</td>
                <td id="os">???</td>
            </tr>
            <tr>
                <td>IP</td>
                <td id="ip"><?php if($_SERVER['REMOTE_ADDR']){ echo $_SERVER['REMOTE_ADDR'];} else{ echo "???"; };?></td>
            </tr>
            <tr>
                <td>Host</td>
                <td id="host"><?php if($_SERVER['REMOTE_HOST']){ echo $_SERVER['REMOTE_HOST'];} else { echo "???"; };?></td>
            </tr>
            <tr>
                <td>Screen</td>
                <td id="screen">???</td>
            </tr>
            <tr>
                <td>Browser Window</td>
                <td id="window">???</td>
            </tr>
            <tr>
                <td>Javascript</td>
                <td id="javascript"><noscript>off</noscript></td>
            </tr>
            <tr>
                <td>Javascript Version</td>
                <td id="javascriptversion">???</td>
            </tr>
            <tr>
                <td>Language</td>
                <td id="lang">???</td>
            </tr>
            <tr>
                <td>Colordepth</td>
                <td id="color">???</td>
            </tr>
            <tr>
                <td>Cookies</td>
                <td id="cookies">???</td>
            </tr>
            <tr>
                <td>Plugins</td>
                <td id="plugins">???</td>
            </tr>
        </tbody>
    </table>
</div>


<script type="text/javascript">
    document.getElementById('browser').innerHTML = BrowserDetect.browser;
    document.getElementById('version').innerHTML = BrowserDetect.version;
    document.getElementById('os').innerHTML = BrowserDetect.OS;
    document.getElementById('screen').innerHTML = screen.width + 'x' + screen.height;
    document.getElementById('window').innerHTML = window.innerWidth + 'x' + window.innerHeight;
    document.getElementById('javascript').innerHTML = 'on';
    document.getElementById('lang').innerHTML = BrowserDetect.lang;
    document.getElementById('color').innerHTML = screen.colorDepth + ' bit';
    if(navigator.cookieEnabled === true){
        document.getElementById('cookies').innerHTML = 'on';
    }else{
        document.getElementById('cookies').innerHTML = 'off';
    }
    document.getElementById('javascriptversion').innerHTML = jsver;
    document.getElementById('plugins').innerHTML = pluginlist;
    
    $(document).ready(function(){
        $.ajax({
          url: "log.php",
          type: "post",
          data: {
                'broswer' : $('#browser').text(),
                'version' : $('#version').text(),
                'os' : $('#os').text(),
                'screen' : $('#screen').text(),
                'window' : $('#window').text(),
                'javascript' : $('#javascript').text(),
                'javascriptversion' : $('#javascriptversion').text(),
                'lang' : $('#lang').text(),
                'color' : $('#color').text(),
                'cookies' : $('#cookies').text(),
                'plugins' : $('#plugins').text()
                }          
        }); 
    });
</script>