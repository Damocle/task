 <h3 class="comment_title">讨论</h3>
                <?php 
                    if (!empty($data2)) {
                        foreach ($data2 as $value) {
                ?>   
                <div class="comment">
                    <div class="face">
                        <a href="<?php echo $value['url']; ?>"><img src="<?php echo $value['face']; ?>"></a>
                    </div>
                    <div class="username">
                        <a href="<?php echo $value['url']; ?>"><?php echo $value['username'];?></a>
                    </div>
                    <div class="date" title="发布时间：<?php echo date('Y-m-d H:i:s', $value['pubTime']); ?>">
                        <?php echo date('Y-m-d H:i:s', $value['pubTime']); ?>
                    </div>
                    <p><?php echo $value['content'];?></p>
                </div>
                <?php 
                        }
                    }
                ?> 
                <div class="comment-form">
                    <h3>发表评论</h3>
                    <div>
                        <label for="username">昵称：</label>
                        <input type="text" id="username" name="username" placeholder="请输入您的昵称" />
                    </div>
                    <div>
                        <label for="email">邮箱：</label>
                        <input type="text" id="email" name="email"  placeholder="请输入合法邮箱" />
                    </div>
                    <div>
                        <label for="url">博客：</label>
                        <input type="text" id="url" name="url" placeholder="请输入合法域名" />
                    </div>
                    <div>
                        <label for="content">评论：</label>
                        <textarea name="content" id="content_text" cols="80" rows="10" required='required' placeholder='请输入您的评论...' ></textarea>
                       <!--  <textarea id="editor" placeholder="这里输入内容" autofocus></textarea> -->
                    </div>
                    <div>
                        <label for="submit"></label>
                        <input type="submit" value="发布评论" id="submit" />
                    </div>
                </div>
                