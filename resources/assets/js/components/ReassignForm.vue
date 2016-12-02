<template>
    <div class="row">
        <div class="col-md-12" v-if="!success">
            <form method="post" @submit="submit">
                <div class="alert alert-danger" v-if="errors.length">
                    <div v-for="error in errors">{{ error }}</div>
                </div>

                <p>Reassign from beta testing program:</p>
                <ul>
                    <li>Close beta testing program account.</li>
                    <li>Delete my personal information from beta testing program databases.</li>
                    <li>Remove access to all applications you were testing.</li>
                    <li>If newsletter was subscribed - unsubscribe.</li>
                </ul>

                <i>Closing account will not remove you from credits from already released applications.</i>

                <hr/>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Email address" v-model="email">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" v-model="agree">Yes, I want my data to be deleted.</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-danger" v-if="errors.length">
                    <div v-for="error in errors">{{ error }}</div>
                </div>

                <a href="https://www.kiberzauras.com" class="btn btn-lg btn-default">Cancel</a>
                <button class="btn btn-lg btn-primary pull-right" :disabled="submited || !agree">
                    <span class="fa fa-spin fa-spinner" v-show="submited"> </span> &nbsp; Reassign
                </button>
            </form>
        </div>
        <div class="col-md-12" v-if="success">
            <p>Hey,</p>
            <p>You have successfully reassigned from out beta testing program.</p>
            <p>All your personal information being deleted from our databases.</p>
            <p>It may take couple of days before we remove you from such services as Apple or Google Play stores.</p>
            <p>Have, a nice day!</p>
            <a href="https://www.kiberzauras.com" class="btn btn-lg btn-default pull-right">Kiberzauras website</a>
        </div>
    </div>
</template>

<script lang="babel">
    export default {
        name: 'close-return',
        data() {
            return {
                email: null,
                agree: false,
                submited: false,
                success: false,
                errors: []
            }
        },
        methods: {
            submit(e) {
                e.preventDefault();
                this.submited = true;
                setTimeout(() => this.success = true, 500);
            }
        }
    }
</script>