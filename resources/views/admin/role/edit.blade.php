  <div class="modal fade" id="modal-edit">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="formEdit">{{ __('Edit role') }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row justify-content-md-center">
                      <div class="form-group col-5">
                          <label for="Name">{{ __('Tên vai trò') }}</label>
                          <input type="text" class="form-control" name="name" id="nameEdit"
                              placeholder="{{ __('Enter Name') }}" aria-describedby="name-error" aria-invalid="true">
                          <small id="name-error" class="error invalid-feedback"></small>
                      </div>
                  </div>
                  <label for="">{{ __('Danh sách quyền') }}</label>
                  <p><span id="permission-error" class="error text-danger"></span></p>
                  <div class="row">
                      @foreach ($permissions as $permission)
                          <div class="col-lg-3 col-md-4">
                              <div class="custom-control custom-checkbox">
                                  <input
                                      class="custom-control-input custom-control-input-secondary custom-control-input-outline checkbox-edit"
                                      type="checkbox" id="permissionChecked{{ $permission->id }}" name="permissions[]"
                                      value="{{ $permission->name }}">
                                  <label for="permissionChecked{{ $permission->id }}"
                                      class="custom-control-label">{{ $permission->name }}</label>
                              </div>
                          </div>
                      @endforeach
                  </div>
                  <input type="hidden" id="idRole">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary btn-edit">{{ __('Lưu') }}</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Đóng') }}</button>
              </div>
          </div>
      </div>
  </div>
