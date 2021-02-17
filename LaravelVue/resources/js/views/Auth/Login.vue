<template>
<div style='height:800px;'>
    <div style="margin-top: 100px;">
            <v-card  class="mx-auto my-12" max-width="600px">
                <v-tabs v-model="tab" show-arrows background-color="deep-purple accent-4"  persistent max-width="600px" min-width="360px" icons-and-text dark grow>
                    <v-tabs-slider color="purple darken-4"></v-tabs-slider>
                    <v-tab v-for="i in tabs" :key="i.id">
                        <v-icon large>{{ i.icon }}</v-icon>
                        <div class="caption py-1">{{ i.name }}</div>
                    </v-tab>
                    <v-tab-item>
                        <v-card class="px-4">
                            <v-card-text>
                                <v-form ref="loginForm" v-model="valid" lazy-validation>
                                    <v-row>
                                        <v-col cols="12">
                                            <v-text-field v-model="loginEmail" :rules="loginEmailRules" label="信箱帳號" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field v-model="loginPassword" :append-icon="show1?'eye':'eye-off'" :rules="[rules.required, rules.min]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="密碼" hint="至少八個字" counter @click:append="show1 = !show1"></v-text-field>
                                        </v-col>
                                        <v-col class="d-flex" cols="12" sm="6" xsm="12">
                                        </v-col>
                                        <v-spacer></v-spacer>
                                        <v-col class="d-flex" cols="12" sm="3" xsm="12" align-end>
                                            <v-btn x-large block :disabled="!valid" color="green" @click="Login"> Login </v-btn>
                                        </v-col>
                                    </v-row>
                                </v-form>
                            </v-card-text>
                        </v-card>
                    </v-tab-item>
                    <v-tab-item>
                        <v-card class="px-4">
                            <v-card-text>
                                <v-form ref="registerForm" v-model="valid" lazy-validation>
                                    <v-row>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-text-field v-model="Name" :rules="[rules.required]" label="姓名" maxlength="20" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-text-field v-model="phone" :rules="[rules.required]" label="手機" maxlength="20" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field v-model="email" :rules="emailRules" label="信箱帳號" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                        <b-form-select :required='identity==null' v-model="identity" :options="options" >

                                        </b-form-select>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field v-model="password" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, rules.min]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="密碼" hint="至少八個字" counter @click:append="show1 = !show1"></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field block v-model="verify" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, passwordMatch]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="確認密碼" counter @click:append="show1 = !show1"></v-text-field>
                                        </v-col>
                                        <v-col class="d-flex" cols="12" sm="6" xsm="12">
                                        </v-col>
                                        <v-spacer></v-spacer>
                                        <v-col class="d-flex" cols="12" sm="3" xsm="12" align-end>
                                            <v-btn x-large block :disabled="!valid" color="green" @click="Register">Register</v-btn>
                                        </v-col>
                                    </v-row>
                                </v-form>
                            </v-card-text>
                        </v-card>
                    </v-tab-item>
                </v-tabs>
            </v-card>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            dialog: true,
            tab: 0,
            tabs: [
                {name:"Login", icon:"mdi-account"},
                {name:"Register", icon:"mdi-account-outline"}
            ],
            valid: true,
            errors: {},
            success: false,
            Name: "",
            phone: "",
            email: "",
            phone:"",
            password: "",
            verify: "",
            loginPassword: "",
            loginEmail: "",
            loginEmailRules: [
            v => !!v || "Required",
            v => /.+@.+\..+/.test(v) || "信箱格式錯誤"
            ],
            emailRules: [
            v => !!v || "Required",
            v => /.+@.+\..+/.test(v) || "信箱格式錯誤"
            ],

            show1: false,
            rules: {
            required: value => !!value || "錯誤",
            min: v => (v && v.length >= 8) || "最少八個字"
            },
            identity: null,
            options: [
                { value: null, text: '請選擇身分' ,disabled:true },
                { value: '農民', text: '農民' },
                { value: '業者', text: '業者' },
                { value: '專家', text: '專家' },
            ],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入

    },
      computed: {
    passwordMatch() {
      return () => this.password === this.verify || "Password must match";
    }
  },
    methods:{

        Login(){
            console.log("Login裡面");
            // get the redirect object
            var redirect = this.$auth.redirect()
            var app = this
            this.$auth.login({
                params: {
                    email: app.email,
                    password: app.password
                },
                success: function() {
                    // handle redirection
                    const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 2 ? 'admin.dashboard' : 'dashboard'
                    this.$router.push({name: redirectTo})
                },
                error: function() {
                    app.has_error = true
                },
                rememberMe: true,
                fetchUser: true
            })

        },
        Register() {
            if (this.$refs.registerForm.validate()) {
                // submit form to server/API here...
        var app = this
        this.$auth.register({
          data: {
            name:app.Name,
            phoneNumber:app.phone,
            email: app.email,
            password: app.password,
            identity: app.identity,
            password_confirmation: app.password_confirmation

          },
          success: function () {
            app.success = true
            this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})
          },
          error: function (res) {
            console.log(res.response)
            app.has_error = true
            app.error = res.response.data.error
            app.errors = res.response.data.errors || {}
          }
        })
            }
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        }
    }
}
</script>
