<div class="search_box col-sm-12 col-md-5" style="margin-left:20px;background: #000;background: rgba(0,0,0,0.3);color:#fff;">
    <h3 style="margin-left:20px;text-align:center;color:#fff;">USE THIS SECTION FOR BULK SIM SWAP</h3>
    <hr>

  
    <div class="col-sm-4 col-md-6">
      <div class="form-group">
        <label for="city">Agent number</label>
         <input type="text" class="form-control" name="MSISDN" placeholder="e.g:250722123000">
       </div>
    </div>

    <div class="col-sm-4 col-md-5">
      <div class="form-group">
        <label for="city">Agent PIN</label>
         <input type="password" class="form-control" name="Code" placeholder="e.g:****">
       </div>
    </div>
     <div class="col-sm-4 col-md-6">
      <div class="form-group">
         <a href="/Assets/samples/BulkSimSwapSample.csv" class="btn btn-info" id="next_step">
               <span class="icon-file-excel"></span> Download sample file.
      </a>
       </div>
      </div>
        <div class="col-sm-4 col-md-6">
        <div class="col-sm-12 col-md-12">
          <input type="file" name="file" id="file" class="inputfile">
           <label for="file"><span class="icon-upload"></span> Choose a file for bulk</label>
        </div>
      </div>
    <div class="col-sm-12 col-md-12"></div>


  	<div class="col-sm-12 col-md-12">
      <hr>
  		 <button type="submit" class="btn btn-warning col-md-12" onclick="return confirm('Are you sure you want to do this SIM SWAP');">
               <span class="icon-spin"></span> SWAP MANY SIMS AT ONCE
  		 </button>
    </div>
</div>