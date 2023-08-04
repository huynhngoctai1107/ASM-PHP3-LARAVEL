<div class="d-flex mb-4" style="max-width: 300px">
    <button class="btn btn-primary px-3 me-2" style="height: 50px"
      onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
      <i class="fas fa-minus"></i>
    </button>

    <div class="form-outline">
      <input id="form1" min="0" name="{{$name}}" value="{{$value}}" type="number" class="form-control" />
      <label class="form-label" for="form1">Số lượng</label>
    </div>

    <button class="btn btn-primary px-3 ms-2" style="height: 50px"
      onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
      <i class="fas fa-plus"></i>
    </button>
  </div>