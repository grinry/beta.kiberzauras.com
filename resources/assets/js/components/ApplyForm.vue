<template>
    <form method="post" @submit="submit">
        <div class="row">
            <div class="col-md-12">

                <div class="alert alert-danger">
                    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Personal information</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" class="form-control" placeholder="First name" v-model="form.personal.name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" placeholder="Last name" v-model="form.personal.surname">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" v-model="form.personal.gender">
                                        <option value=null>Select</option>
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of birth</label>
                                    <input type="date" class="form-control" placeholder="Date of birth" v-model="form.personal.birthday">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" placeholder="Email address" v-model="form.personal.email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone number <span>(optional)</span></label>
                                    <input type="text" class="form-control" placeholder="Phone number" v-model="form.personal.phone">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Interested in</div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="col-sm-12 text-justify">
                                Select what you would like to test:
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Games</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Applications</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Devices</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 text-justify">
                                Select all devices that you have and can use for testing games and applications:
                            </div>
                            <div class="col-sm-6" v-for="device in devices">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" v-model="form.devices[device]">{{ device }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Social platforms</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-12 text-justify">
                                Select all social platforms that you have and can (want to) use when testing games and applications:
                            </div>
                            <div class="col-sm-6" v-for="platform in platforms">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" v-model="form.platforms[platform]">{{ platform }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="panel panel-default">
                    <div class="panel-heading">Agreements</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-12 text-justify">
                                <p>
                                    By clicking "Apply" you agree, that all your personal information is correct and You allow
                                    us to send invites to test our software to your email {{ form.personal.email }} or provided
                                    phone number.
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">I agree.</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Allow us to send You newsletter with blog posts or product updates.</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="alert alert-danger">
                    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                </div>

                <button class="btn btn-lg btn-primary pull-right" :disabled="submited">
                    <span class="fa fa-spin fa-spinner" v-show="submited"> </span> &nbsp; Apply
                </button>
            </div>
        </div>
    </form>
</template>

<script lang="babel">
    export default {
        name: 'apply-form',
        data() {
            return {
                form: {
                    personal: {
                        name: null,
                        surname: null,
                        gender: null,
                        birthday: null,
                        email: null,
                        phone: '+'
                    },
                    interested: [],
                    devices: [],
                    platforms: []
                },
                devices: [],
                platforms: [
                        "Facebook",
                        "Google+"
                ],
                submited: false
            };
        },
        created() {
            this.loadDevices();
        },
        methods: {
            loadDevices() {
                console.log('loading devices');
                this.$http.get('/api/devices').then(response => response.json())
                        .then(response => {
                            this.devices = response;
                        }).catch(error => console.log(error));
            },
            submit(e) {
                e.preventDefault();
                this.submited = true;
                this.$http.post('/api/register').then(response => {
                    setTimeout(() => this.submited = false, 500);
                }).catch(error => {
                    setTimeout(() => this.submited = false, 500);
                });
                return false;
            }
        }
    }
</script>
