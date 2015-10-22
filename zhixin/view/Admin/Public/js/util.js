//删除提示
function alertDelete(id)
{
	var Obj=document.getElementById(id);
	aDelete=getByClass(Obj,'delete');
	for(var i=0;i<aDelete.length;i++)
	{
		aDelete[i].onclick=function()
		{
			return confirm('您点击了删除按钮，是否删除？');
		}
	}
}
//getByClass
function getByClass(obj,className)
{
	var arr=obj.getElementsByTagName('*');
	var data=[];
	for(var i=0;i<arr.length;i++)
	{
		if(arr[i].className==className)
		{
			data.push(arr[i]);
		}
	}
	return data;
}
//添加checkbox选项
function checkBox(id)
{
	var obj=document.getElementById(id);
	var aLevel1=getByClass(obj,'level1');//alert(aLevel1.length);
	var aLevel2=getByClass(obj,'level2');//alert(aLevel2.length);
	var aLevel3=getByClass(obj,'level3');//alert(aLevel3.length);
	regesterEvent(aLevel1,function(){
			foreachCheck(aLevel2);
			foreachCheck(aLevel3);
		});
	regesterEvent(aLevel2,function(){
		foreachCheck(aLevel3);
	});

	function regesterEvent(level,fn)
	{
		for(var i=0;i<level.length;i++)
		{
			level[i].onclick=function()
			{
				if(typeof fn=='function')
				{
					fn();
				}
			}
		}
	}

	function foreachCheck(alevel)
	{
		for(var j=0;j<alevel.length;j++)
		{
			if(alevel[j].checked=='')
			{
				alevel[j].checked='checked';
			}
			else{
				alevel[j].checked='';
			}
		}
	}
}