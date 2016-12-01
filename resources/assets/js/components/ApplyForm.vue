<template>
        <div class="row">
            <div class="col-md-12" v-if="!success">
                <form method="post" @submit="submit">
                    <div class="alert alert-danger" v-if="errors.length">
                        <div v-for="error in errors">{{ error }}</div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Personal information</div>

                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-groug">
                                        <label>First name</label>
                                        <input type="text" class="form-control" placeholder="First name" v-model="form.first_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" placeholder="Last name" v-model="form.last_name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" v-model="form.gender" :options="gender">
                                            <option v-for="(option, key) in gender" :value="key">
                                                {{ option }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of birth</label>
                                        <input type="date" class="form-control" placeholder="Date of birth" v-model="form.birthday">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="Email address" v-model="form.email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone number <span>(optional)</span></label>
                                        <input type="text" class="form-control" placeholder="Phone number" v-model="form.phone_number">
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

                                <div class="col-sm-6" v-for="interest in interests">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" v-model="interest.selected">{{ interest.value }}</label>
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
                                            <label><input type="checkbox" v-model="device.selected">{{ device.value }}</label>
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
                                <div class="col-sm-6" v-for="platform in social_platforms">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" v-model="platform.selected">{{ platform.value }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group" v-if="platform.selected">
                                        <label>{{platform.value}} profile url <span>(optional)</span></label>
                                        <input type="text" class="form-control" placeholder="Profile url" v-model="platform.profile">
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
                                        us to send invites to test our software to your email {{ form.email }} or provided
                                        phone number.
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="1" v-model="form.agree">I agree.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="1" v-model="form.newsletter">Allow us to send You newsletter with blog posts or product updates.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="alert alert-danger" v-if="errors.length">
                        <div v-for="error in errors">{{ error }}</div>
                    </div>

                    <a href="https://www.kiberzauras.com" class="btn btn-lg btn-default">Cancel</a>
                    <button class="btn btn-lg btn-primary pull-right" :disabled="submited || !form.agree">
                        <span class="fa fa-spin fa-spinner" v-show="submited"> </span> &nbsp; Apply
                    </button>
                </form>
            </div>
            <div class="col-md-12" v-if="success">
                <p>Hey {{ form.first_name }},</p>
                <p>You have successfully registered to our beta testing program.</p>
                <p>We will sent you invites for new applications once we will release it for testing.</p>
                <p>Have, a nice day!</p>
                <a href="https://www.kiberzauras.com" class="btn btn-lg btn-default pull-right">Kiberzauras website</a>
            </div>
        </div>
</template>

<script lang="babel">
    export default {
        name: 'apply-form',
        data() {
            return {
                form: {
                    first_name: null,
                    last_name: null,
                    gender: null,
                    birthday: null,
                    email: null,
                    phone_number: '+',
                    agree: false,
                    newsletter: false
                },
                devices: [],
                social_platforms: [],
                interests: [],
                gender: [],
                submited: false,
                loadingData: false,
                errors: [],
                error_inputs: [],
                success: false
            }
        },
        created() {
            this.loadFormData();
        },
        methods: {
            loadFormData() {
                this.loadingData = true;
                this.$http.get('/api/form-data').then(response => response.json())
                        .then(response => {
                            this.devices = response.devices;
                            this.social_platforms = response.social_platforms;
                            this.interests = response.interests;
                            this.gender = response.gender;
                            this.loadingData = false;
                        }).catch(error => {
                            console.log(error);
                            this.loadingData = true
                        });
            },
            submit(e) {
                e.preventDefault();
                this.submited = true;
                this.$http.post('/api/register', this.fields).then(response => {
                    this.errors = [];
                    this.success = true;
                    setTimeout(() => this.submited = false, 500);
                }).catch(error => {
                    if (typeof error.data === 'object') {
                        this.errors = _.flatten(_.toArray(error.data));
                    } else {
                        this.errors = ['Something went wrong. Please try again. If error persists please contact us hello@kiberzauras.com.'];
                    }
                    setTimeout(() => this.submited = false, 500);
                });
                return false;
            }
        },

        computed: {
            fields() {
                let filtered_devices = this.devices.filter(item => item.selected);
                let devices = [];
                for(let i=0; i<filtered_devices.length; i++) {
                    devices.push(filtered_devices[i].key);
                }

                let filtered_interests = this.interests.filter(item => item.selected);
                let interests = [];
                for(let i=0; i<filtered_interests.length; i++) {
                    interests.push(filtered_interests[i].key);
                }

                let filtered_socials = this.social_platforms.filter(item => item.selected);
                let socials = [];
                for(let i=0; i<filtered_socials.length; i++) {
                    socials.push({
                        id: filtered_socials[i].key,
                        profile: filtered_socials[i].profile
                    });
                }

                return {
                    first_name: this.form.first_name,
                    last_name: this.form.last_name,
                    gender: this.form.gender,
                    birthday: this.form.birthday,
                    email: this.form.email,
                    phone_number: this.form.phone_number,
                    agreement: this.form.agree,
                    newsletter: this.form.newsletter,
                    devices: devices,
                    interests: interests,
                    social_platforms: socials
                };
            }
        }
    }
</script>
