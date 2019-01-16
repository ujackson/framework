<avored-form-input 
    field-name="name"
    label="Name" 
    field-value="{!! $model->name ?? "" !!}" 
    error-text="{!! $errors->first('name') !!}"
    v-on:change="changeModelValue"
    autofocus="autofocus"
        >
</avored-form-input>

<avored-form-input 
    field-name="description"
    label="Description" 
    field-value="{!! $model->code ?? '' !!}" 
    error-text="{!! $errors->first('description') !!}"
    v-on:change="changeModelValue"
        >
</avored-form-input>