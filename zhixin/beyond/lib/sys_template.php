<?php

/**
 * 模板类
 */
final class Template 
{
        public $template_name = null;
        public $data = array();
        public $out_put = null;
        
        public function init($template_name,$data = array()) 
        {
                $this->template_name = $template_name;
                $this->data = $data;
                $this->fetch();
        }

        public function fetch()//加载模板
        {
                $view_file = VIEW_PATH.'/'.$this->template_name.'.php';
                if (file_exists($view_file)) 
                {
                        //extract($this->data);将变量导入到符号表
                        $data=$this->data;//数组赋值到模板
                        //var_dump($data);
                        ob_start();//打开输出控制缓冲
                        include $view_file;
                        $content=ob_get_contents();
                        ob_end_clean();
                        $this->out_put=$content;
                } 
                else 
                {
                        trigger_error($view_file.' 模板不存在');
                }
        }

        public function fetchJump($information,$href)//加载默认跳转模板,传入参数为数组，提示信息，跳转地址
        {
            $jump_file=SYS_TEMPLATE_PATH.'/sys_jump.php';
            if(file_exists($jump_file))
            {
                $title=$information;
                $jumpHref=$href;
                ob_start();
                include $jump_file;
                $content=ob_get_contents();
                ob_end_clean();
                $this->out_put=$content;
            }
        }

        public function outPut()
        {
                echo $this->out_put;
        }
        /**
         * 写入静态化文件
         * @access      public  
         */
//        public function toHtml() {
//                if (!is_dir(ROOT_PATH . '/cache/template/')) {
//                        mkdir(ROOT_PATH . '/cache/template/', 0777);
//                }
//                if (!$fp = @fopen(ROOT_PATH . '/cache/template/' . $filename . '.html', 'w')) {
//                        trigger_error('文件 ' . ROOT_PATH . '/cache/template/' . $filename . '.html' . ' 不能打开');
//                }
//                if (fwrite($fp, $content) == FALSE) {
//                        trigger_error('文件 ' . ROOT_PATH . '/cache/template/' . $filename . '.html' . ' 写入失败');
//                }
//                fclose($fp);
//        }

}

