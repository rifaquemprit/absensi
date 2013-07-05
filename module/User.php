	<script type="text/javascript">
		var url;
		function newUser(){
			$('#dlg').dialog('open').dialog('setTitle','New User');
			$('#fm').form('clear');
			url = 'save_user.php';
		}
		function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
				url = 'update_user.php?id='+row.id;
			}
		}
		function saveUser(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}
		function removeUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this user?',function(r){
					if (r){
						$.post('remove_user.php',{id:row.id},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		}
		
		function doSearch(){
			$('#dg').datagrid('load',{
				nim: $('#nim').val()
			});
		}
	</script>
<div id='content' style="padding:150px;">
	<table id="dg" title="List Menu" class="easyui-datagrid" style="width: auto;height:auto;margin:15px; min-height: 200px"
			url="get_users.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="nama_lengkap" width="90">Nama Lengkap</th>
				<th field="username" width="50">Username</th>
				<th field="email" width="50">Email</th>
				<th field="levelisasi" width="50">Levelisasi</th>
				<th field="status" width="50">Status</th>
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New User</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeUser()">Remove User</a>
		
		<span>Nama:</span>
		<input id="nama" class="easyui-searchbox" data-options="prompt:'Please Input Value',searcher:doSearch">
		
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:450px;height:300px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">User Information</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>Nama Lengkap:</label>
				<input name="nama_lengkap" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Username:</label>
				<input name="username" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Password:</label>
				<input name="password" type="password" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Phone:</label>
				<input name="phone">
			</div>
			<div class="fitem">
				<label>Email:</label>
				<input name="email" class="easyui-validatebox" validType="email">
			</div>
			<div class="fitem">
				<label>Status:</label>
				<select name="status" class="easyui-validatebox">
					<option>--</option>
					<option>Administrator</option>
					<option>Manager</option>
					<option>Staff Admin</option>
				</select>
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>

</div>