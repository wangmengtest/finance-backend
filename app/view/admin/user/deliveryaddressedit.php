<include file="admin@header" />
<script type="text/javascript">
$(document).ready(function(){
	$.formValidator.initConfig({ submitonce:true,formid:"form1",autotip:true});
//	$("#username").formValidator({onshow:"请输入用户名",onfocus:"请输入用户名",oncorrect:"正确"}).regexValidator({regexp:"notempty",datatype:"enum",onerror:"请确认您的输入是否正确"});
	$("#mobile").formValidator({onshow:"请输入手机号",onfocus:"请输入手机号",oncorrect:"输入正确"}).regexValidator({regexp:"mobile",datatype:"enum",onerror:"手机号错误"});
//	$("#tel").formValidator({onshow:"请输入电话",onfocus:"请输入电话",oncorrect:"正确"}).regexValidator({regexp:"notempty",datatype:"enum",onerror:"请确认您的输入是否正确"});
	$("#address").formValidator({onshow:"请输入用户详细地址",onfocus:"请输入用户详细地址",oncorrect:"正确"}).regexValidator({regexp:"notempty",datatype:"enum",onerror:"请确认您的输入是否正确"});
	//$("#zip").formValidator({onshow:"请输入邮政编码",onfocus:"请输入邮政编码",oncorrect:"正确"}).regexValidator({regexp:"notempty",datatype:"enum",onerror:"请确认您的输入是否正确"});
});
</script>
<div class="pad-10">
	<div class="content-menu line-x blue"><{$topnav}></div>
	<div class="table-form">
		<form action="" method="post" id="form1">
		<table width="100%">
		
			<tr>
				<th>用户ID</th>
				<td width="80%"><{$contact_info.uid}></td>
			</tr>
			<tr>
				<th>用户名</th>
				<td width="80%"><{$contact_info.username}></td>
			</tr>
			
			<tr>
				<th>手机号</th>
				<td width="80%"><input name="data[mobile]" type="text" class="input-text" id="mobile" value="<{$contact_info.mobile}>"/></td>
			</tr>
			
			<tr>
				<th>电话</th>
				<td width="80%"><input name="data[tel]" type="text" class="input-text" id="tel" value="<{$contact_info.tel}>"/></td>
			</tr>
			
			<tr>
				<th>收货地址</th>
				<td width="80%">
					<input name="data[address]" type="text" class="input-text" size="50" id="address" value="<{$contact_info.address}>"/>
				</td>
			</tr>
			
			<tr>
				<th>邮政编码</th>
				<td width="80%"><input name="data[zip]" type="text" class="input-text" id="zip" value="<{$contact_info.zip}>"/></td>
			</tr>
		</table>
		<div class="btn">
			<input type="hidden" name="uid" value="<{$contact_info.uid}>" />
			<input type="hidden" name="data[id]" value="<{$contact_info.id}>">
			<input name="do" type="hidden" value="dosubmit" />
			<input type="submit" class="button" name="dosubmit" value="确定" />&nbsp;&nbsp;<input type="button" class="button" name="goback" value="返回上页" onclick="javascript:window.history.back(-1);" />
		</div>
		</form>
	</div>
</div>

<include file="admin@footer" />