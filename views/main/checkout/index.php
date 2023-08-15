
<div class="container-fluid vh-100 wh-100 bg-light">
    <div class="row text-center mx-3"><h1 class=" mb-4">Payment Form</h1></div>
    <div class="row mx-3 d-flex justify-content-center">
        <div class="col-lg-4">
        <ul class="list-group ">
            <?php 
            foreach($orders as $order) {
                echo '
                <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">'.$order->name.'</div>
                    &times;'.$order->num.'
                </div>
                <span class="badge bg-dark rounded-pill">'.$order->price.'đ</span>
                </li>
                ';
            }
            ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Shipping</div>
                    Basic service
                </div>
                <span class="badge bg-dark rounded-pill">20000đ</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Total</div>
                </div>
                <span class="badge bg-primary rounded-pill"><?php echo $sum +20000?>đ</span>
            </li>
        </ul>
        </div>
        <div class="col-lg-7 ">
            <form action="index.php?page=main&controller=checkout&action=check" method="post" class="row g-3 needs-validation" novalidate>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">First name</label>
                    <input maxlength="50" type="text" class="form-control" id="validationCustom01" value="Mark" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Last name</label>
                    <input maxlength="50" name="lname" type="text" class="form-control" id="validationCustom02" value="Otto" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Phone</label>
                    <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">012</span>
                    <input name="phone" type="text" class="form-control" id="phone" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please fill your phone.
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">City/Province</label>
                    <input maxlength="50" type="text" class="form-control" id="validationCustom03" required>
                    <div class="invalid-feedback">
                    Please provide a valid city/province.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">District</label>
                    <input maxlength="50" type="text" class="form-control" id="validationCustom03" required>
                    <div class="invalid-feedback">
                    Please provide a valid district.
                    </div>
                </div>
                <div class="col">
                    <label for="validationCustom05" class="form-label">Detail Address</label>
                    <input maxlength="100" type="text" class="form-control" id="validationCustom05" required>
                    <div class="invalid-feedback">
                    Please provide a valid detail address.
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Check all infomation above another time.
                    </label>
                    <div class="invalid-feedback">
                        You must check before submitting.
                    </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Commit to order</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
     const forms = document.querySelectorAll('.needs-validation')

// Loop over them and prevent submission
const phone = document.getElementById("phone");

    Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
        }
        form.classList.add('was-validated');
        
        if(phone.value !== "" && !validatePhoneNumber(phone.value)){
            event.preventDefault()
            event.stopPropagation()
            alert("Phone number is in valid!");
            form.classList.add('was-validated');
        }
        
        
            
        
        
    }, false)
    })
    function validatePhoneNumber(input_str) {
        var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
    return re.test(input_str);
    }

</script>