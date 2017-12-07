
@if($transaction=='profile')
<h4>Ažuriranje vaših osobnih podataka</h4>
<form class="form-horizontal" method="POST" action="/agent/saving_profile">
      {{csrf_field()}}
    <div class="form-group">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-4">
            <img src="{{$agent_info->profile}}" width="150" height="100" class="img-thumbnail" alt="">
        </div>
        <label for="input-Default" class="col-sm-2 control-label">Profilna Slika</label>
        <div class="col-sm-4">
            <input type="file" class="form-control input-rounded" id="image" accept="image/x-png,image/jpeg">
            <input type="hidden" id="imageText" value="{{$agent_info->profile}}">
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">Pozivni Broj</label>
        <div class="col-sm-2">
            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->prefix}}" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">Ime</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->first_name}}" readonly>
        </div>
        <label for="input-Default" class="col-sm-2 control-label">Prezime</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->last_name}}" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="input-rounded-Default" class="col-sm-2 control-label">E-mail</label>
        <div class="col-sm-10">
            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->email}}" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">Glavni Telefon</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="primaryPhone" value="{{$agent_info->primary_phone}}" >
        </div>
        <label for="input-Default" class="col-sm-2 control-label">Alternativni Telefon</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="secondaryPhone" value="{{$agent_info->secondary_phone}}">
        </div>
    </div>
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">Informacija</label>
        <div class="col-sm-10">
            <textarea class="form-control input-rounded" placeholder="" id="otherInfo" rows="4=6">{{$agent_info->other_info}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">Adresa</label>
        <div class="col-sm-10">
            <textarea class="form-control input-rounded" placeholder="" id="address" rows="4=6">{{$agent_info->address}}</textarea>
        </div>
    </div>
    <div class="col-md-3 pull-right">
        <button type="button" class="btn btn-primary btn-block" id="saveProfile"><i class="fa fa-pencil m-r-xs"></i>Spremiti</button>
    </div>
</form>
@else
<h4>Ažuriraj zaporku</h4>
<form class="form-horizontal" method="POST" action="/agent/checking_password">
    {{csrf_field()}}
    <div class="form-group col-md-12">
        <label for="input-Default" class="col-md-3 control-label">Trenutna lozinka</label>
        <div class="col-md-9">
            <input type="password" class="form-control input-rounded" id="currentPassword" >
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="input-Default" class="col-md-3 control-label">Nova lozinka</label>
        <div class="col-md-9">
            <input type="password" class="form-control input-rounded" id="newPassword">
        </div>
       
    </div>
    <div class="form-group col-md-12">
        
        <label for="input-Default" class="col-sm-3 control-label">Potvrdi lozinku</label>
        <div class="col-md-9">
            <input type="password" class="form-control input-rounded" id="confirmPassword" >
        </div>
    </div>
    <div class="col-md-3 pull-right">
        <button type="button" class="btn btn-primary btn-block" id="savePassword"><i class="fa fa-pencil m-r-xs"></i>Spremiti</button>
    </div>
</form>
@endif