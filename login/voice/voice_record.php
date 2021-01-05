<html>
 	<head>
		<script src="src/recorder.js"></script>
		<script src="src/Fr.voice.js"></script>
    <script src="js/jquery.js"></script>
		<script src="js/app.js"></script>
 	</head>
 	<body>
    <h2>Record</h2>
		<audio controls id="audio"></audio>
    <div>
      <a class="button recordButton" id="record">Record</a>
      <a class="button disabled one" id="pause">Pause</a>
      <a class="button disabled one" id="stop">Reset</a>
	  <a class="button disabled one" id="play">Play</a>
	  <a class="button disabled one" id="save">
	  Save answer</a>
    </div><br/>
    <div>
    </div>
		<div data-type="wav">
			<p>WAV Controls:</p>
			
			<a class="button disabled one" id="download">Download</a>
      <a class="button disabled one" id="base64">Base64 URL</a>
      
		</div>
  
    <canvas id="level" height="200" width="500"></canvas>
		<style>
		.button{
			display: inline-block;
			vertical-align: middle;
			margin: 0px 5px;
			padding: 5px 12px;
			cursor: pointer;
			outline: none;
			font-size: 13px;
			text-decoration: none !important;
			text-align: center;
			color:#fff;
			background-color: #4D90FE;
			background-image: linear-gradient(top,#4D90FE, #4787ED);
			background-image: -ms-linear-gradient(top,#4D90FE, #4787ED);
			background-image: -o-linear-gradient(top,#4D90FE, #4787ED);
			background-image: linear-gradient(top,#4D90FE, #4787ED);
			border: 1px solid #4787ED;
			box-shadow: 0 1px 3px #BFBFBF;
		}
		a.button{
			color: #fff;
		}
		.button:hover{
			box-shadow: inset 0px 1px 1px #8C8C8C;
		}
		.button.disabled{
			box-shadow:none;
			opacity:0.7;
		}
    canvas{
      display: block;
    }
		</style>
 	</body>
</html>
