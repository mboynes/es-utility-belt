
		<div id="home">
			<div class="row">
				<div class="view-container span6">
					<form method="post" data-response="home_response">
						<input type="hidden" name="type" value="basic" />
						<div class="control-group">
							<label class="control-label" for="code">URL</label>
							<div class="controls">
								<input name="url" id="request_url" value="http://localhost:9200/" type="text" class="span6" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="code">Request Body</label>
							<div class="controls" id="editor_wrap">
								<div id="editor" rows="8" cols="40"></div>
								<textarea name="body" id="request_body" rows="8" cols="40" class="span6"></textarea>
							</div>
						</div>
						<div class="form-actions">
							<input value="GET" name="method" type="submit" class="btn btn-primary" />
							<input value="POST" name="method" type="submit" class="btn" />
							<input value="PUT" name="method" type="submit" class="btn" />
							<input value="DELETE" name="method" type="submit" class="btn" />
						</div>
					</form>
					<div id="request_history" class="well" style="padding:8px 0">
						<?php echo get_request_history() ?>
					</div>
					<p>
						<a href="#request_history" class="show_toggle pull-right btn"><span class="caret caret-up"></span> Hide History</a>
					</p>
				</div>

				<div id="home_response" class="view-container span6"></div>
			</div>
		</div>
