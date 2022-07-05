<div class="container mt-4">
    @if (isset($status))
        <div class="alert alert-success">
            {{ $status }}
        </div>
    @else
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Add Form
            </div>
            <div class="alert alert-danger" id="email_exists" style="display:none;">
                <ul>
                    <li>Email is dublicated!</li>
                </ul>
            </div>
            <div class="card-body">
                <form name="add-form" id="add-form" onsubmit="sendForm(this.id);">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6 mb-1">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required="">
                            <span class="text-danger" id="nameError"></span>
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="surname">Surname</label>
                            <input type="text" id="surname" name="surname" class="form-control" required="">
                            <span class="text-danger" id="surnameError"></span>
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control" required="">
                            <span class="text-danger" id="emailError"></span>
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="password">Password</label>
                            <input type="text" id="password" name="password" class="form-control" required="">
                            <span class="text-danger" id="passwordError"></span>
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="passwordConfirmation">Password confirmation</label>
                            <input type="text" id="passwordConfirmation" name="passwordConfirmation"
                                class="form-control" required="">
                            <span class="text-danger" id="passwordConfirmationError"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    @endif
</div>
