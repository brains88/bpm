<!--
TERMS OF USE
BY USING THE CODE, YOU AGREE:
1. THAT THE MATERIALS ARE PROVIDED "AS IS" AND WITHOUT WARRANTIES OF ANY KIND
2. NOT TO CHANGE ANY OF THE JAVASCRIPT CODE, INCLUDING THE LICENSE TEXT
3. NOT TO REMOVE THE LINE OF TEXT "powered by calculator.net"
4. THAT THE COPYRIGHT BELONGS TO calculator.net
5. NOT TO REMOVE THE TERMS OF USE
-->
<!--BEGIN OF MORTGAGE CALCULATOR CODE-->
<script>
/*****************************************
(C) https://www.calculator.net all right reserved.
*****************************************/
function gObj(t){return document.all?"string"==typeof t?document.all(t):t.style:document.getElementById?"string"==typeof t?document.getElementById(t):t.style:null}function trimAll(t){for(;" "==t.substring(0,1);)t=t.substring(1,t.length);for(;" "==t.substring(t.length-1,t.length);)t=t.substring(0,t.length-1);return t}function isNumber(t){return!((t+="").length<1)&&!isNaN(t)}function formatAsMoney(t){t=t.toString().replace(/\$|\,/g,""),isNaN(t)&&(t="0"),sign=t==(t=Math.abs(t)),t=Math.floor(100*t+.50000000001),cents=t%100,t=Math.floor(t/100).toString(),cents<10&&(cents="0"+cents);for(var e=0;e<Math.floor((t.length-(1+e))/3);e++)t=t.substring(0,t.length-(4*e+3))+","+t.substring(t.length-(4*e+3));return(sign?"":"-")+"$"+t+"."+cents}function formatNum(t){if(outStr=""+t,t=parseFloat(outStr),10<outStr.length&&(outStr=""+t.toPrecision(10)),-1<outStr.indexOf(".")){for(;"0"==outStr.charAt(outStr.length-1);)outStr=outStr.substr(0,outStr.length-1);return"."==outStr.charAt(outStr.length-1)&&(outStr=outStr.substr(0,outStr.length-1)),outStr}return outStr}function showquickmsg(t,e){e&&(t="<font color=red>"+t+"</font>"),gObj("coutput").innerHTML=t}var dataArray=new Array,theLoanTerm=0,delayShow=!0;function calc(){showquickmsg("calculating...",!0),gObj("resulttable").innerHTML="",setTimeout("process()",2)}function process(){if(Bv=gObj("cloanamount").value,fv=gObj("cloanterm").value,vs=gObj("cinterestrate").value,Xd=gObj("cpropertytaxes").value,KA=gObj("cpmi").value,Ti=gObj("cothercost").value,isNumber(Bv))if(isNumber(fv))if(fv<1||50<fv)showquickmsg("loan term need to be a number between 0 and 50",!0);else if(isNumber(vs))if(vs<-200||200<vs)showquickmsg("interest rate needs to be between -200 and 200",!0);else if(isNumber(Xd))if(isNumber(KA))if(isNumber(Ti)){for(Ph=vs/100/12,0==Ph?ud=Bv/fv/12:ud=Ph/(1-Math.pow(1+Ph,12*-fv))*Bv,NB=parseInt(12*fv),fG=12*fv-NB,HG=new Array,i=1;i<=12*fv;i++)HG[i-1]=new Array,QK=Math.pow(1+Ph,i),0==Ph?Kp=Bv-i*ud:Kp=QK*Bv-(QK-1)/Ph*ud,1==i?HG[i-1][0]=Bv:HG[i-1][0]=HG[i-2][1],HG[i-1][1]=Kp,HG[i-1][2]=ud,HG[i-1][3]=ud-(HG[i-1][0]-HG[i-1][1]),1==i?HG[i-1][4]=HG[i-1][3]:HG[i-1][4]=HG[i-1][3]+HG[i-2][4];"undefined"==typeof cc&&(1e-4<fG?(HG[NB]=new Array,HG[NB][0]=HG[NB-1][1],HG[NB][1]=0,HG[NB][2]=fG*ud,HG[NB][3]=HG[NB][2]-(HG[NB][0]-HG[NB][1]),HG[NB][4]=HG[NB-1][4]+HG[NB][3]):NB--,dataArray=HG,theLoanTerm=fv,Xd=parseFloat(Xd),KA=parseFloat(KA),Ti=parseFloat(Ti),Mb=Xd+KA+Ti,MV="<table cellpadding='3' width='100%'>",MV+="<tr bgcolor='#dddddd'><td><b>Monthly Pay</b></td><td align=right>"+formatAsMoney(ud)+"</td></tr>",0<Mb&&(0<Xd&&(MV+="<tr><td>Monthly Property Tax</td><td align=right>"+formatAsMoney(Xd/12)+"</td></tr>"),0<KA&&(MV+="<tr><td>Monthly PMI (Private Mortgage Insurance)</td><td align=right>"+formatAsMoney(KA/12)+"</td></tr>"),0<Ti&&(MV+="<tr><td>Monthly Other Costs</td><td align=right>"+formatAsMoney(Ti/12)+"</td></tr>"),MV+="<tr bgcolor='#dddddd'><td><b>Monthly Total Out of Pocket</b></td><td align=right>"+formatAsMoney(ud+Mb/12)+"</td></tr>"),MV+="<tr><td>Total of "+(12*fv).toFixed(2)+" Monthly Payments</td><td align=right>"+formatAsMoney(12*ud*fv)+"</td></tr>",MV+="<tr><td>Total Interest Paid</td><td align=right>"+formatAsMoney(12*ud*fv-Bv)+"</td></tr>",MV+="</table>",showquickmsg(MV,!1))}else showquickmsg("other insurance and costs need to be numeric",!0);else showquickmsg("private mortgage insurance need to be numeric",!0);else showquickmsg("property taxes need to be numeric",!0);else showquickmsg("interest rate need to be numeric",!0);else showquickmsg("loan term need to be numeric",!0);else showquickmsg("loan amount need to be numeric",!0)}
</script>

<!--YOU CAN CHANGE THE FOLLOWING CODE-->
<table bgcolor="#dddddd" id="mortgagecalc">
	<tr>
		<td>
			<table width="100%">
				<form>
				<tr>
					<td valign="top">
						<table id="calinputtable" align="center">
							<tr><td>Loan Amount</td><td align="right">
								<input type="text" name="cloanamount" size="5" id="cloanamount" value="300000" style="text-align: right;width:100px;" onchange="calc()"></td><td>$</td></tr>

							<tr><td>Loan Term</td><td align="right"><input type="text" name="cloanterm" size="5" id="cloanterm" value="30" style="text-align: right;width:100px;" onchange="calc()"></td><td>years</td></tr>

							<tr><td>Rate</td><td align="right"><input type="text" name="cinterestrate" size="5" id="cinterestrate" value="6" style="text-align: right;width:100px;" onchange="calc()"></td><td>%</td></tr>

							<tr><td>Property Tax</td><td align="right"><input type="text" name="cpropertytaxes" size="5" id="cpropertytaxes" value="0" style="text-align: right;width:100px;" onchange="calc()"></td><td>$/year</td></tr>

							<tr><td>PMI Insurance</td><td align="right"><input type="text" name="cpmi" size="5" id="cpmi" value="0" style="text-align: right;width:100px;" onchange="calc()"></td><td>$/year</td></tr>

							<tr><td>Other Cost</td><td align="right"><input type="text" name="" size="5" id="cothercost" value="0" style="text-align: right;width:100px;" onchange="calc()"></td><td>$/year</td></tr>

							<tr><td colspan="3" align="center"><input type="button" value="Calculate" onclick="calc()"></td></tr>
						</table>
					</td>
				</tr>
				</form>
			</table>
			<div id="coutput"></div>
			<div id="resulttable"></div>
			<div class="bg-main-dark text-white" id="calfootnote">Powered by <a href="https://www.calculator.net" rel="nofollow">calculator.net</a></div>
			<script>calc();</script>
		</td>
	</tr>
</table>
<!--END OF MORTGAGE CALCULATOR CODE-->