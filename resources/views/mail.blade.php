<style type="text/css">
body
{
color: #333;
}
.labels
{
color: #555;
font-size: 15px;
padding: 1px;
padding-left: 5px;
}
.answers
{
color: #000;
padding-left: 5px;
}
.sub-group
{
float: left;
}
.divider
{
border-bottom: 1px solid #aaa;
}
.table-main thead tr td
{
text-align: center;
font-size: 9px;
padding: 3px;
color: #555;
border-right: 1px solid #aaa;
border-bottom: 1px solid #aaa;
}
.table-main tbody tr td
{
text-align: center;
font-size: 12px;
padding: 3px;
color: #000;
border-right: 1px solid #aaa;
border-bottom: 1px solid #aaa;
}
.bord
{
text-align: center;
border-bottom: 1px solid #aaa;
border-right: 1px solid #aaa;
border-bottom: 1px solid #aaa;
}
</style>
<div style="text-align: right; font-size: 12px;">Invoice</div>
<div style="overflow: auto; margin: 15px 0px 20px 0px;">
    {{-- <div style="float: left; width: 80px; text-align: left;"></div> --}}
    {{-- <div style="float: left; width: 80px; text-align: left;"><img width="50px;" src="http://digima_mvm.dev/assets/img/yellow_pages_logo.png"></div> --}}
    <center><div style="font-size: 22px; font-weight: bold;margin-bottom: 20px;">Zute stranice</div></center>
    <div style="float: right; width: 250px;">
        <table border="1" bordercolor="green" cellspacing="-1px" width="100%">
            <tr>
                <td style="font-size: 9px; padding: 3px; background-color: #eee">INVOICE NUMBER</td>
            </tr>
            <tr>
                <td style="font-size: 9px; height: 28px; font-size: 16px; padding: 5px;">
                    {{$invoice_number}}
                </td>
            </tr>
        </table>
    </div>
</div>
<div style="font-style: italic; font-size: 11px;  margin-top:70px">NOTE: PLEASE PAY YOUR ORDER</div>
<div style="border: 2px solid #000;" >
    <div>
        <div class="labels">CROTIA Directory</div>
        <div class="answers">  Zagreb, Croatia, <br>P: (123) 456-7890</div>
    </div>
    <div class="divider"></div>
    <div style="margin:100px 0px 50px 0px;">
         






        <div class="labels" style="font-size: 14px; padding: 1px; padding-left: 5px;">Osoba za kontakt</div>
        <div class="sub-group" style="width: 300px;">
            <div class="labels">Naziv</div>
            <div class="answers">{{$invoice_info->contact_first_name}} {{$invoice_info->contact_last_name}}</div>
        </div>
        
        <div class="sub-group" style="width: 300px;float:right">
            <div class="labels">Email</div>
            <div class="answers">{{$invoice_info->user_email}}</div>
        </div>
    </div>
    <div class="divider"></div>
    
    <div style="margin:50px 0px 100px 0px;">
        <div style="margin:10px 0px 10px 0px;">
            <table class="table-main" cellspacing="0" cellpadding="0" width="100%">
                <thead>
                    <tr>
                        <th class="bord">Artikal</th>
                        <th class="bord">Naziv tvrtke</th>
                        <th class="bord">Clanstvo</th>
                        <th class="bord" style="border-right: none;">Cijena</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bord">Item One</td>
                        <td class="bord">{{$invoice_info->business_name}}</td>
                        <td class="bord">{{$invoice_info->membership_name}}</td>
                        <td class="bord">{{$invoice_info->membership_price}}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <div class="bord" style="margin:10px 0px 100px 0px;">
            <div style="float: right; width: 100px;margin:10px 0px 100px 0px;">
                
                <div class="labels">Ukupan Iznos</div>
                <hr>
                <div class="answers">{{$invoice_info->membership_price}}</div>
                <hr>
            </div>
        </div>
        
    </div>
    <div style="margin:100px 0px 100px 0px;">
    </div>
    
</div>
<div class="divider"></div>
<div style="overflow: auto; margin: 15px 0px 20px 0px;">
    <div style="left:0px; width: 400px; font-size: 15px; font-weight: bold; text-align: center;">
        <h3>Thank you !</h3>
        <p class="labels" align="justify">Ocekujte da će vas stvarni racun biti dostavljen mjesecno </p>
    </div>
    <div class="labels" > Zagreb, Croatia, P: (123) 456-7890</div>
</div>
<div class="divider"></div>