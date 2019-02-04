<template>
    <div>
        
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" class="form-control" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" />
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Login</button>
            <a href="#">Forgot Password?</a>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            fieldType:  { type:String,   default: 'text'},
            label:      { type:String,   required: true},
            fieldName:  { type:String,   required: true},
            fieldClass: { type:String,   default: 'form-control'},
            fieldValue: { type:String,   default: ''},
            errorText : { type:String,   default: ''},
            autofocus : { type:Boolean,  default: false},
            disabled :  { type:Boolean,  default: false},

        },
        computed: {
            computedClass: function() {
                if(this.errorText == ""){
                    return this.fieldClass;
                }
                
                return this.fieldClass + " is-invalid";
            }
        },
        data: function () {
            return {
                value: this.fieldValue,
                dataDisplayError : function() {   
                    if(this.errorText == ""){
                        return false;
                    } 
                    return true;    
                }
            }
        },
        methods:{
            onChange: function(event){
                this.$emit('change', event.target.value, this.fieldName);

                if( event.target.value != "") {
                    this.dataDisplayError = false
                }

                this.value = event.target.value;
            }
        }
    }
</script>
