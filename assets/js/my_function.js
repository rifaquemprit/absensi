function sesuaikan_tinggi(samakan,pembanding)
{
	var cek_pembanding = pembanding;
	if(cek_pembanding == undefined)
	{
		cek_pembanding = "main-content"
	}
	else
	{
		cek_pembanding = pembanding;
	}
	setInterval('get_tinggi("data-siswa","main-content")',2000)
}

function get_tinggi(samakan,pembanding)
{
	$('#'+samakan).height($('#'+pembanding).height())
}