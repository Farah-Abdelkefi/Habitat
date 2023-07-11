<script>

    function minus_Run()
    {
        var $min = document.getElementById('Quantity').value;
        if($min >1)
            $min-=1;
        document.getElementById('Quantity').value = $min;


    }

    function plus_Run() {
        var $add = document.getElementById('Quantity').value ;
        $add ++;
        document.getElementById('Quantity').value = $add;

    }


</script>

<!-- col.// -->
<div class="container" >
    <div class="col-sm-9 col-6 mb-3"  >
        <label class="mb-2 d-block align-content-md-center " style=" display: inherit;">Quantity</label>
        <div   class="input-group mb-3"   style=" width : max-content;">

            <button class="btn btn-white border border-secondary px-3" onclick="minus_Run()" type="button" id="button-addon1"  data-mdb-ripple-color="dark" >
                <i class="fas fa-minus"></i>
            </button>
                 <input name="quantity" id="Quantity" type="number" class="form-control text-center border border-secondary"  value="1" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1" />
            <div>
                <button  class="btn btn-white border border-secondary px-3" onclick="plus_Run()" type="button" id="button-addon2" data-mdb-ripple-color="dark" >
                    <i class="fas fa-plus" ></i>
                </button>
            </div>

        </div>
    </div>


</div>
