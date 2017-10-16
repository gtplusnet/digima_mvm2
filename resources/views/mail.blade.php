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
font-size: 9px;
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
    <div style="float: left; width: 80px; text-align: left;"><img width="50px;" src="http://digima_mvm.dev/assets/img/yellow_pages_logo.png"></div>
    <div style="left:0px; width: 320px; font-size: 22px; font-weight: bold; ">CROATIA Directory</div>
    <div class="labels" > Zagreb, Croatia, P: (123) 456-7890</div>
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
<div style="font-style: italic; font-size: 11px;  margin-top:70px">NOTE: PLEASE READ INSTRUCTIONS AT THE BACK</div>
<div style="border: 2px solid #000;" >
    <div>
        <div class="labels">CROTIA Directory</div>
        <div class="answers">  Zagreb, Croatia, <br>P: (123) 456-7890</div>
    </div>
    <div class="divider"></div>
    <div style="margin:100px 0px 50px 0px;">
        <div class="labels" style="font-size: 14px; padding: 1px; padding-left: 5px;">Business Contact Person</div>
        <div class="sub-group" style="width: 300px;">
            <div class="labels">Name</div>
            <div class="answers">{{$invoice_info->contact_first_name}} {{$invoice_info->contact_last_name}}</div>
        </div>
        <div class="sub-group" style="width: 300px;">
            <div class="labels">Primary Phone</div>
            <div class="answers">{{$invoice_info->business_phone}}</div>
        </div>
        <div class="sub-group" style="width: 300px;">
            <div class="labels">Seconday Phonge</div>
            <div class="answers">{{$invoice_info->business_alt_phone}}</div>
        </div>
        <div class="sub-group" style="width: 300px;">
            <div class="labels">Seconday Phone</div>
            <div class="answers">{{$invoice_info->business_alt_phone}}</div>
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
                        <th class="bord">Item</th>
                        <th class="bord">Business Name</th>
                        <th class="bord">Membership</th>
                        <th class="bord" style="border-right: none;">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Item One</td>
                        <td>{{$invoice_info->business_name}}</td>
                        <td>{{$invoice_info->payment_method_name}}</td>
                        <td >5000.00</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <div class="bord" style="margin:10px 0px 100px 0px;">
            <div style="float: right; width: 100px;margin:10px 0px 100px 0px;">
                
                <div class="labels">Subtotal</div>
                <hr>
                <div class="answers">$7282</div>
                <hr>
                <div class="labels">Subtotal</div>
                <hr>
                <div class="answers">$7282</div>
                <hr>
                <div class="labels">Subtotal</div>
                <hr>
                <div class="answers">$7282</div>
                
            </div>
        </div>
        
    </div>
    <div style="margin:100px 0px 100px 0px;">
        
        -
    </div>
    
</div>
<div class="divider"></div>
<div style="overflow: auto; margin: 15px 0px 20px 0px;">
    <div style="left:0px; width: 400px; font-size: 15px; font-weight: bold; text-align: center;">
        <h3>Thank you !</h3>
        <p class="labels" align="justify">Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
        <div >
            <img src="http://digima_mvm.dev/assets/admin/merchant/assets/images/signature.png" style="width:200px; margin-top: 10px;">
        </div>
    </div>
    <div class="labels" > Zagreb, Croatia, P: (123) 456-7890</div>
    
</div>
<div class="divider"></div>