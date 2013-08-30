<?php
header('Content-type: text/html; charset=utf-8');

/*
Procedure extraction tool
FUNCTION: Extracting procedures from Scratch 2.0 backpacks and converting them to [scratchblocks] format
INTENDED USE: Importing and showing scripts for Scratch Resources 2.0
*/
define('PROCEDURES_ONLY', 1);

if (isset($_POST['username'])) {
	
	//print_r($json);
	$blockDict = '[["move %n steps", " ", 1, "forward:", 10], ["turn @turnRight %n degrees", " ", 1, "turnRight:", 15], ["turn @turnLeft %n degrees", " ", 1, "turnLeft:", 15], ["--"], ["point in direction %d.direction", " ", 1, "heading:", 90], ["point towards %m.spriteOrMouse", " ", 1, "pointTowards:", ""], ["--"], ["go to x:%n y:%n", " ", 1, "gotoX:y:"], ["go to %m.spriteOrMouse", " ", 1, "gotoSpriteOrMouse:", "mouse-pointer"], ["glide %n secs to x:%n y:%n", " ", 1, "glideSecs:toX:y:elapsed:from:"], ["--"], ["change x by %n", " ", 1, "changeXposBy:", 10], ["set x to %n", " ", 1, "xpos:", 0], ["change y by %n", " ", 1, "changeYposBy:", 10], ["set y to %n", " ", 1, "ypos:", 0], ["--"], ["if on edge, bounce", " ", 1, "bounceOffEdge"], ["-"], ["set rotation style %m.rotationStyle", " ", 1, "setRotationStyle", "left-right"], ["--"], ["x position", "r", 1, "xpos"], ["y position", "r", 1, "ypos"], ["direction", "r", 1, "heading"], ["say %s for %n secs", " ", 2, "say:duration:elapsed:from:", "Hello!", 2], ["say %s", " ", 2, "say:", "Hello!"], ["think %s for %n secs", " ", 2, "think:duration:elapsed:from:", "Hmm...", 2], ["think %s", " ", 2, "think:", "Hmm..."], ["-"], ["show", " ", 2, "show"], ["hide", " ", 2, "hide"], ["-"], ["switch costume to %m.costume", " ", 2, "lookLike:", "costume1"], ["next costume", " ", 2, "nextCostume"], ["switch backdrop to %m.backdrop", " ", 2, "startScene", "backdrop1"], ["-"], ["change %m.effect effect by %n", " ", 2, "changeGraphicEffect:by:", "color", 25], ["set %m.effect effect to %n", " ", 2, "setGraphicEffect:to:", "color", 0], ["clear graphic effects", " ", 2, "filterReset"], ["-"], ["change size by %n", " ", 2, "changeSizeBy:", 10], ["set size to %n%", " ", 2, "setSizeTo:", 100], ["-"], ["go to front", " ", 2, "comeToFront"], ["go back %n layers", " ", 2, "goBackByLayers:", 1], ["-"], ["costume #", "r", 2, "costumeIndex"], ["backdrop name", "r", 2, "sceneName"], ["size", "r", 2, "scale"], ["switch backdrop to %m.backdrop", " ", 102, "startScene", "backdrop1"], ["switch backdrop to %m.backdrop and wait", " ", 102, "startSceneAndWait", "backdrop1"], ["next backdrop", " ", 102, "nextScene"], ["-"], ["change %m.effect effect by %n", " ", 102, "changeGraphicEffect:by:", "color", 25], ["set %m.effect effect to %n", " ", 102, "setGraphicEffect:to:", "color", 0], ["clear graphic effects", " ", 102, "filterReset"], ["-"], ["backdrop name", "r", 102, "sceneName"], ["backdrop #", "r", 102, "backgroundIndex"], ["play sound %m.sound", " ", 3, "playSound:", "pop"], ["play sound %m.sound until done", " ", 3, "doPlaySoundAndWait", "pop"], ["stop all sounds", " ", 3, "stopAllSounds"], ["-"], ["play drum %d.drum for %n beats", " ", 3, "playDrum", 1, 0.25], ["rest for %n beats", " ", 3, "rest:elapsed:from:", 0.25], ["-"], ["play note %d.note for %n beats", " ", 3, "noteOn:duration:elapsed:from:", 60, 0.5], ["set instrument to %d.instrument", " ", 3, "instrument:", 1], ["-"], ["change volume by %n", " ", 3, "changeVolumeBy:", -10], ["set volume to %n%", " ", 3, "setVolumeTo:", 100], ["volume", "r", 3, "volume"], ["-"], ["change tempo by %n", " ", 3, "changeTempoBy:", 20], ["set tempo to %n bpm", " ", 3, "setTempoTo:", 60], ["tempo", "r", 3, "tempo"], ["clear", " ", 4, "clearPenTrails"], ["-"], ["stamp", " ", 4, "stampCostume"], ["-"], ["pen down", " ", 4, "putPenDown"], ["pen up", " ", 4, "putPenUp"], ["-"], ["set pen color to %c", " ", 4, "penColor:"], ["change pen color by %n", " ", 4, "changePenHueBy:"], ["set pen color to %n", " ", 4, "setPenHueTo:", 0], ["-"], ["change pen shade by %n", " ", 4, "changePenShadeBy:"], ["set pen shade to %n", " ", 4, "setPenShadeTo:", 50], ["-"], ["change pen size by %n", " ", 4, "changePenSizeBy:", 1], ["set pen size to %n", " ", 4, "penSize:", 1], ["-"], ["clear", " ", 104, "clearPenTrails"], ["when @greenFlag clicked", "h", 5, "whenGreenFlag"], ["when %m.key key pressed", "h", 5, "whenKeyPressed", "space"], ["when this sprite clicked", "h", 5, "whenClicked"], ["when backdrop switches to %m.backdrop", "h", 5, "whenSceneStarts", "backdrop1"], ["--"], ["when %m.triggerSensor > %n", "h", 5, "whenSensorGreaterThan", "loudness", 10], ["--"], ["when I receive %m.broadcast", "h", 5, "whenIReceive", ""], ["broadcast %m.broadcast", " ", 5, "broadcast:", ""], ["broadcast %m.broadcast and wait", " ", 5, "doBroadcastAndWait", ""], ["wait %n secs", " ", 6, "wait:elapsed:from:", 1], ["-"], ["repeat %n", "c", 6, "doRepeat", 10], ["forever", "cf", 6, "doForever"], ["-"], ["if %b then", "c", 6, "doIf"], ["if %b then", "e", 6, "doIfElse"], ["wait until %b", " ", 6, "doWaitUntil"], ["repeat until %b", "c", 6, "doUntil"], ["-"], ["stop %m.stop", "f", 6, "stopScripts", "all"], ["-"], ["when I start as a clone", "h", 6, "whenCloned"], ["create clone of %m.spriteOnly", " ", 6, "createCloneOf"], ["delete this clone", "f", 6, "deleteClone"], ["-"], ["wait %n secs", " ", 106, "wait:elapsed:from:", 1], ["-"], ["repeat %n", "c", 106, "doRepeat", 10], ["forever", "cf", 106, "doForever"], ["-"], ["if %b then", "c", 106, "doIf"], ["if %b then", "e", 106, "doIfElse"], ["wait until %b", " ", 106, "doWaitUntil"], ["repeat until %b", "c", 106, "doUntil"], ["-"], ["stop %m.stop", "f", 106, "stopScripts", "all"], ["-"], ["create clone of %m.spriteOnly", " ", 106, "createCloneOf"], ["touching %m.touching?", "b", 7, "touching:", ""], ["touching color %c?", "b", 7, "touchingColor:"], ["color %c is touching %c?", "b", 7, "color:sees:"], ["distance to %m.spriteOrMouse", "r", 7, "distanceTo:", ""], ["-"], ["ask %s and wait", " ", 7, "doAsk", "What&apos;s your name?"], ["answer", "r", 7, "answer"], ["-"], ["key %m.key pressed?", "b", 7, "keyPressed:", "space"], ["mouse down?", "b", 7, "mousePressed"], ["mouse x", "r", 7, "mouseX"], ["mouse y", "r", 7, "mouseY"], ["-"], ["loudness", "r", 7, "soundLevel"], ["-"], ["video %m.videoMotionType on %m.stageOrThis", "r", 7, "senseVideoMotion", "motion"], ["turn video %m.videoState", " ", 7, "setVideoState", "on"], ["set video transparency to %n%", " ", 7, "setVideoTransparency", 50], ["-"], ["timer", "r", 7, "timer"], ["reset timer", " ", 7, "timerReset"], ["-"], ["%m.attribute of %m.spriteOrStage", "r", 7, "getAttribute:of:"], ["-"], ["current %m.timeAndDate", "r", 7, "timeAndDate", "minute"], ["days since 2000", "r", 7, "timestamp"], ["username", "r", 7, "getUserName"], ["ask %s and wait", " ", 107, "doAsk", "What&apos;s your name?"], ["answer", "r", 107, "answer"], ["-"], ["key %m.key pressed?", "b", 107, "keyPressed:", "space"], ["mouse down?", "b", 107, "mousePressed"], ["mouse x", "r", 107, "mouseX"], ["mouse y", "r", 107, "mouseY"], ["-"], ["loudness", "r", 107, "soundLevel"], ["-"], ["video %m.videoMotionType on %m.stageOrThis", "r", 107, "senseVideoMotion", "motion", "Stage"], ["turn video %m.videoState", " ", 107, "setVideoState", "on"], ["set video transparency to %n%", " ", 107, "setVideoTransparency", 50], ["-"], ["timer", "r", 107, "timer"], ["reset timer", " ", 107, "timerReset"], ["-"], ["%m.attribute of %m.spriteOrStage", "r", 107, "getAttribute:of:"], ["-"], ["current %m.timeAndDate", "r", 107, "timeAndDate", "minute"], ["days since 2000", "r", 107, "timestamp"], ["username", "r", 107, "getUserName"], ["%n + %n", "r", 8, "+", "", ""], ["%n - %n", "r", 8, "-", "", ""], ["%n * %n", "r", 8, "*", "", ""], ["%n / %n", "r", 8, "/", "", ""], ["-"], ["pick random %n to %n", "r", 8, "randomFrom:to:", 1, 10], ["-"], ["%s < %s", "b", 8, "<", "", ""], ["%s = %s", "b", 8, "=", "", ""], ["%s > %s", "b", 8, ">", "", ""], ["-"], ["%b and %b", "b", 8, "&"], ["%b or %b", "b", 8, "|"], ["not %b", "b", 8, "not"], ["-"], ["join %s %s", "r", 8, "concatenate:with:", "hello ", "world"], ["letter %n of %s", "r", 8, "letter:of:", 1, "world"], ["length of %s", "r", 8, "stringLength:", "world"], ["-"], ["%n mod %n", "r", 8, "%", "", ""], ["round %n", "r", 8, "rounded", ""], ["-"], ["%m.mathOp of %n", "r", 8, "computeFunction:of:", "sqrt", 9], ["set %m.var to %s", " ", 9, SET_VAR], ["change %m.var by %n", " ", 9, CHANGE_VAR], ["show variable %m.var", " ", 9, "showVariable:"], ["hide variable %m.var", " ", 9, "hideVariable:"], ["add %s to %m.list", " ", 12, "append:toList:"], ["-"], ["delete %d.listDeleteItem of %m.list", " ", 12, "deleteLine:ofList:"], ["insert %s at %d.listItem of %m.list", " ", 12, "insert:at:ofList:"], ["replace item %d.listItem of %m.list with %s", " ", 12, "setLine:ofList:to:"], ["-"], ["item %d.listItem of %m.list", "r", 12, "getLine:ofList:"], ["length of %m.list", "r", 12, "lineCountOfList:"], ["%m.list contains %s", "b", 12, "list:contains:"], ["-"], ["show list %m.list", " ", 12, "showList:"], ["hide list %m.list", " ", 12, "hideList:"], ["play drum %n for %n beats", " ", 98, "drum:duration:elapsed:from:", 1, 0.25], ["set instrument to %n", " ", 98, "midiInstrument:", 1], ["loud?", "b", 98, "isLoud"], ["abs %n", "r", 98, "abs"], ["sqrt %n", "r", 98, "sqrt"], ["stop script", "f", 98, "doReturn"], ["stop all", "f", 98, "stopAll"], ["switch to background %m.costume", " ", 98, "showBackground:", "backdrop1"], ["next background", " ", 98, "nextBackground"], ["forever if %b", "cf", 98, "doForeverIf"], ["noop", "r", 99, "COUNT"], ["counter", "r", 99, "COUNT"], ["clear counter", " ", 99, "CLR_COUNT"], ["incr counter", " ", 99, "INCR_COUNT"], ["for each %m.varName in %s", "c", 99, "doForLoop", "v", 10], ["while %b", "c", 99, "doWhile"], ["all at once", "c", 99, "warpSpeed"], ["scroll right %n", " ", 99, "scrollRight", 10], ["scroll up %n", " ", 99, "scrollUp", 10], ["align scene %m.scrollAlign", " ", 99, "scrollAlign", "bottom-left"], ["x scroll", "r", 99, "xScroll"], ["y scroll", "r", 99, "yScroll"], ["hide all sprites", " ", 99, "hideAll"], ["user id", "r", 99, "getUserId"], ["set %m to %s", " ", 1, "setVar:to:"], ["change %m by %n", " ", 1, "changeVar:by:"]];
	';
	$dictionary = array();
	$cblocks = array();
	preg_match_all('%\["(.*?)".*?\]%m', $blockDict, $matches);
	foreach ($matches[0] as $key => $blockDef) {
		if ($matches[1][$key] != '-' && $matches[1][$key] != '--') {
			preg_match('%^\[".*?", "(.*?)", (\d+), "(.*?)"%', $blockDef, $matches2);
			if (isset($matches2[3])) {
				if ($matches2[1] == 'c' || $matches2[1] == 'cf') {
					$cblocks[] = $matches2[3];
				}
				$selector = $matches2[3];
				$text = $matches[1][$key];
				$text = str_replace('@turnLeft', 'left', $text);
				$text = str_replace('@turnRight', 'right', $text);
				$text = str_replace('%d.direction', '%n', $text);
				$text = str_replace('%m.spriteOrMouse', '%m', $text);
				$text = str_replace('%m.rotationStyle', '%m', $text);
				$text = str_replace('%m.costume', '%m', $text);
				$text = str_replace('%m.backdrop', '%m', $text);
				$text = str_replace('%m.effect', '%m', $text);
				$text = str_replace('%m.sound', '%m', $text);
				$text = str_replace('%d.note', '%n', $text);
				$text = str_replace('%d.instrument', '%s', $text);
				$text = str_replace('%m.spriteOnly', '%m', $text);
				$text = str_replace('%m.key', '%m', $text);
				$text = str_replace('%m.videoMotionType', '%m', $text);
				$text = str_replace('%m.videoState', '%m', $text);
				$text = str_replace('%m.attribute', '%m', $text);
				$text = str_replace('%m.spriteOrStage', '%m', $text);
				$text = str_replace('%m.timeAndDate', '%m', $text);
				$text = str_replace('%m.backdrop', '%m', $text);
				$text = str_replace('%m.mathOp', '%m', $text);
				$text = str_replace('%m.var', '%m', $text);
				$text = str_replace('%m.list', '%m', $text);
				$text = str_replace('%d.listItem', '%n', $text);
				$text = str_replace('%m.triggerSensor', '%m', $text);
				$text = str_replace('%m.broadcast', '%m', $text);
				$text = str_replace('%d.listDeleteItem', '%n', $text);
				$text = str_replace('%m.touching', '%m', $text);
				$dictionary[$selector] = $text;
			}
		}
	}
	function showtabs($count) {
		for ($i = 0; $i < $count; $i++) {
			echo "\t";
		}
	}
	function parsescript($script, $level) {
		global $dictionary, $cblocks;
		if (sizeof($script)) {
			foreach ($script as $block) {
				showtabs($level);
				if ($block[0] == 'procDef') {
					echo 'define ' . parseblock($block[1], $block[2]) . "\n";
				} else if ($block[0] == 'whenGreenFlag') {
					echo 'when gf clicked' . "\n";
				} else if (in_array($block[0], $cblocks)) {
					$blocktype = $block[0];
					$args = $block;
					array_shift($args);
					echo parseblock($dictionary[$blocktype], $args) . "\n";
					parsescript(end($block), $level + 1);
					showtabs($level);
					echo 'end' . "\n";
				} else {
					$blocktype = $block[0];
					array_shift($block);
					if (!isset($dictionary[$blocktype])) {
						echo parseblock($blocktype, $block) . "\n";
					} else {
						echo parseblock($dictionary[$blocktype], $block) . "\n";
					}
				}
			}
		}
	}
	function parseblock($text, $params) {
		global $dictionary;
		if ($text == 'genericReporter') {
			$reporter = true;
			if ($params[0] == 'getParam') {
				return '(' . $params[1] . ')';
			} else if ($params[0] == 'readVariable') {
				return '(' . $params[1] . ')';
			} else if ($params[0] == 'contentsOfList:') {
				return '(' . $params[1] . ')';
			} else {
				$text = $dictionary[$params[0]];
				array_shift($params);
			}
		} else if ($text == 'contentsOfList:') {
			return '(' . $params[0] . ')';
		} else if ($text == 'readVariable') {
			return '(' . $params[0] . ')';
		} else {
			$reporter = false;
		}
		$count = 0;
		$ok = false;
		while (!$ok) {
			$ok = true;
			for ($i = 0; $i < strlen($text); $i++) {
				if ($text{$i} == '%' && $i < strlen($text) - 1) {
					$ok = false;
					$part1 = substr($text, 0, $i);
					$part2 = substr($text, $i + 2);
					$oldtext = $text;
					$text = $part1;
					if (gettype($params[$count]) == 'array') {
						$text .= parseblock('genericReporter', $params[$count]);
						$text .= $part2;
						$count++;
						break;
					} else {
						$cur_param = $params[$count];
					}
					if ($oldtext{$i + 1} == 'n') {
						$text .= '(' . $cur_param . ')';
					}
					if ($oldtext{$i + 1} == 's') {
						$text .= '[' . $cur_param . ']';
					}
					if ($oldtext{$i + 1} == 'b') {
						$text .= '<' . $cur_param . '>';
					}
					if ($oldtext{$i + 1} == 'm') {
						$text .= '[' . $cur_param . ' v]';
					}
					$text .= $part2;
					$count++;
					break;
				}
			}
		}
		if ($reporter) {
			return '(' . $text . ')';
		} else {
			return $text;
		}
	}
	
	header('Content-type: text/plain');
	
	$data = @file_get_contents('http://scratch.mit.edu/internalapi/backpack/' . rawurlencode($_POST['username']) . '/get?salt=' . rand(1,100000));
	if (!$data) {
		echo 'when gf clicked
say [The backpack you requested is empty!]';
		die;
	}
	$json = json_decode($data);
	foreach ($json as $script) {
		if ((string)$script->type == 'script') {
			foreach ($script->scripts as $script) {
				parsescript($script, 0);
			}
		}
	}
	die;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" href="resources/scratchblocks2.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script> 
		<script type="text/javascript" src="resources/scratchblocks2.js"></script>
		<title>Backpack block parser</title>
		<script type="text/javascript">
		function getUser(username) {
			document.getElementById('blocksArea').innerHTML = 'Loading...';
			var xhr = new XMLHttpRequest();
			xhr.open('POST', '<?php echo basename($_SERVER['SCRIPT_FILENAME']); ?>');
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send('username=' + encodeURIComponent(username));
			
			xhr.onreadystatechange = function() {
				if (xhr.status != 200) {
					document.getElementById('blocksArea').innerHTML = 'Error: ' + req.status;
				}
				document.getElementById('blocksArea').innerHTML = xhr.responseText;
			}
		}
		</script>
	</head>
	<body>
		<h3>Load new user</h3>
		<p><input type="text" id="username" /> <input type="submit" value="Load" onclick="getUser(document.getElementById('username').value)" /></p>
		<pre class="blocks" id="blocksArea">
when gf clicked
say [There are no blocks right now!]
		</pre>
		<p><input type="button" onclick="scratchblocks2.parse('pre.blocks');" value="Parse!" /></p>
		<p style="font-style:italic">Copyright &copy;2013 FutureSight Technologies - All rights reserved</p>
	</body>
</html>