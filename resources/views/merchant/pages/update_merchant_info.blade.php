@if($transaction=='profile')

<form class="form-horizontal" method="POST" action="/merchant/saving_merchant_info">
   {{csrf_field()}}
   <div class="panel-body" id="showProfile1">
      <div class="form-group" style="margin-top:50px;">
         <h4>Update Personal Information</h4>
         <label for="business_name" class="col-sm-2 control-label">Naziv Tvrtke</label>
         <div class="col-sm-10">
            <input type="text" class="form-control" id="business_name" value="{{$merchant_info->business_name}}" readonly>
         </div>
      </div>
      <div class="form-group">
         <label for="business_phone" class="col-sm-2 control-label">Glavni telefon</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="business_phone" value="{{$merchant_info->business_phone}}" readonly>
         </div>
         <label for="business_alt_phone" class="col-sm-2 control-label">Alternativni telefon</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="business_alt_phone" value="{{$merchant_info->business_alt_phone}}" readonly>
         </div>
      </div>
      <div class="form-group">
         <label for="twitter_url" class="col-sm-2 control-label">Twitter korisničko ime</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="twitter_url" name="twitter_url" value="{{$merchant_info->twitter_url}}" >
         </div>
         <label for="facebook_url" class="col-sm-2 control-label">URL Facebooka</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="facebook_url" name="facebook_url" value="{{$merchant_info->facebook_url}}" >
         </div>
      </div>
      <div class="form-group">
         <label for="input-Default" class="col-sm-2 control-label">Cijela poslovna adresa</label>
         <div class="col-sm-10">
            <textarea class="form-control" id="business_complete_address" name="business_complete_address" rows="4=6"></textarea>
         </div>
      </div>
      <div class="form-group">
         <label for="input-Default" class="col-sm-2 control-label">Županja</label>
         <div class="col-sm-2">
            <select class="form-control" name="county_id" id="county_id" style="border-radius: 20px;">
               <option value="{{$merchant_info->county_id}}"></option>
               @foreach($county_list as $county_lists)
               <option value="{{ $county_lists->county_id }}">{{ $county_lists->county_name }}</option>
               @endforeach
            </select>
         </div>
         <label for="city" class="col-sm-2 control-label">Grad</label>
         <div class="col-sm-2">
            <select class="form-control" name="city_list" id="city_list" style="width: 190px; border-radius: 20px;">
               <option value="{{$merchant_info->city_id}}"></option>
            </select>
         </div>
         <label for="postal_code" class="col-sm-2 control-label">Poštanski broj</label>
         <div class="col-sm-2">
            <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="" readonly>
         </div>
      </div>
      
      
      
      <div class="col-md-15">
         <div class="text-right">
            <button type="button" class="btn btn-primary" id="saveprofile" style="padding: 5px 18px;"><i class="fa fa-pencil m-r-xs"></i>Save Information</button>
         </div>
      </div>
   </form>
   @endif