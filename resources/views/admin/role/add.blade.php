<div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formAddLabel">{{__('Thêm vai trò')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          <div class="row justify-content-md-center">
            <div class="form-group col-5">
              <label for="Name">{{ __('Tên vai trò') }}</label>
              <input type="text" class="form-control" name="name" id="nameInput"
              placeholder="{{ __('Enter Name') }}" aria-describedby="name-error" aria-invalid="true">
              <small id="name-error" class="error invalid-feedback"></small>
            </div>
          </div>
          <label for="" >{{ __('Danh sách quyền') }}</label>
          <p><span id="permission-error" class="error text-danger"></span></p>
          <div class="row">
            @foreach ($permissions as  $permission)
              <div class="col-lg-3 col-md-4">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input custom-control-input-secondary custom-control-input-outline" type="checkbox" id="permissionCheck{{$permission->id}}" name="permissions[]" value="{{$permission->name}}">
                  <label for="permissionCheck{{$permission->id}}" class="custom-control-label">{{$permission->name}}</label>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-create">{{__('Lưu')}}</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Đóng')}}</button>
        </div>
      </div>
    </div>
  </div>