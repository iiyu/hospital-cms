function GetTab(str,num)
{
	var obj = document.getElementById(str);
	var obj_li = obj.getElementsByTagName("em");
	var obj1 = document.getElementById(str +"_1");
	var obj1_ul = obj1.getElementsByTagName("span");
	//alert(obj_li[2]);
	for(var i=0;i<obj_li.length;i++)
	{
		if(num == i)	
		{
			obj_li[i].className = "c1";
			obj1_ul[i].style.display = "block";
		}
		else
		{
			obj_li[i].className = "c2";
			obj1_ul[i].style.display = "none";
		}
	}
}
