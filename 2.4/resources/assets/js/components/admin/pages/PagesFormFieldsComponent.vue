<template>
    <div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" 
                name="title" :value="model.title"
                v-validate="'required'" />
            <p class="text-danger" v-if="errors.has('title')">
                {{ errors.first('title') }}
            </p>
        </div>

        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" 
                name="url" :value="model.url"
                v-validate="'required'" />
            <p class="text-danger" v-if="errors.has('url')">
                {{ errors.first('url') }}
            </p>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <label>Order</label>
            </div>
            <div class="col-md-2">
                <select name="order" id="order" class="form-control">
                    <option value=""></option>
                    <option value="before">Before</option>
                    <option value="after">After</option>
                    <option value="child">Child Of</option>
                </select>
            </div>
            <div class="col-md-5">
                <select name="orderPage" id="orderPage" class="form-control">
                    <option value=""></option>

                    
                    <option v-for="page in orderPages" :key="page.id" 
                        :value="page.id" v-html="padTitle(page)"></option>
                    
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" 
                id="content" v-model="model.content"
                v-validate="'required'"></textarea>
            <p class="text-danger" v-if="errors.has('content')">
                {{ errors.first('content') }}
            </p>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-default" value="Submit" />
        </div>
    </div>
</template>

<script>
export default {

  props: ['model', 'orderPages'],
  methods: {
      padTitle(page) {
          let space = '&nbsp;';

          return space.repeat(page.depth * 4) + page.title;
      }
  }
}
</script>
