<template>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Personal information</div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control">
                                    <option value=null>Select</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of birth</label>
                                <input type="date" class="form-control" placeholder="Date of birth">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="Email address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone number <span>(optional)</span></label>
                                <input type="text" class="form-control" placeholder="Phone number">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Devices</div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control">
                                    <option value=null>Select</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of birth</label>
                                <input type="date" class="form-control" placeholder="Date of birth">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="Email address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone number <span>(optional)</span></label>
                                <input type="text" class="form-control" placeholder="Phone number">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'apply-form',
        created() {
            console.log('Component ready.')
        }
    }
</script>
