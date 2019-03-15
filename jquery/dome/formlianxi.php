<!DOCTYPE html>
<html>
<head>
	<title>表单提交练习</title>
	<style>
	label{
		color:#5555cf;
	}
	input{
		margin-bottom: 15px;
		border-radius: 3px;
		border:1px solid #aaa;
		background-color:#eee;
	}
	</style>
</head>
<body>
	<form action="actionform.php" method="post">
		<div>
			<label for="uname">name</label>
		</div>
		<div>
			<input type="text" name="uname" id="uname">
		</div>
		<div>
			<label for="age">age</label>
		</div>
		<div>
			<input type="text" name="age" id="age">
		</div>
		<div>
			<label for="tel">tel</label>
		</div>
		<div>
			<input type="text" name="tel" id="tel">
		</div>
		<div>
			<label for="address">address</label>
		</div>
		<div>
			<input type="text" name="address" id="address">
		</div>
		<div>
			<label for="qq">QQ:</label>
		</div>
		<div>
			<input type="text" name="qq" id="qq">
		</div>
		<div>
			<label for="msg">自我评价</label>
		</div>
		<div>
			<textarea rows=10 cols=30 name="msg" id="msg"></textarea>
		</div>
		<div>
			<input type="submit" name="" value="提交">
			<input type="reset" name="" value="重置">
		</div>
	</form>
</body>
</html>