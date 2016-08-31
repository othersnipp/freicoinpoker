<?PHP 
class img_opt 
{ 
var $max_width; 
var $max_height; 
var $path; 
var $new_path; 
var $img; 
var $new_width; 
var $new_height; 
var $mime; 
var $image; 
var $width; 
var $height; 
    function max_width($width){ 
        $this->max_width = $width; 
    } 
    function max_height($height){ 
        $this->max_height = $height; 
    } 
    function image_path($path){ 
        $this->path = $path; 
    } 
	function image_new_path($path){ 
        $this->new_path = $path; 
    } 
    function get_mime(){ 
        $img_data = getimagesize($this->path); 
        $this->mime = $img_data['mime']; 
    } 
    function create_image(){ 
        switch($this->mime) 
        { 
            case 'image/jpeg': 
                $this->image = imagecreatefromjpeg($this->path); 
            break; 
             
            case 'image/gif': 
                $this->image = imagecreatefromgif($this->path); 
            break; 
             
            case 'image/png': 
                $this->image = imagecreatefrompng($this->path); 
            break; 
			default :
                $this->image = imagecreatefromjpeg($this->path); 
        } 
    }     
    function image_resize() { 
                set_time_limit(30); 
                $this->get_mime(); 
                $this->create_image(); 
                $this->width = imagesx($this->image); 
                $this->height = imagesy($this->image); 
                $this->set_dimension(); 
                $image_resized = imagecreatetruecolor($this->new_width,$this->new_height); 
                imagecopyresampled($image_resized, $this->image, 0, 0, 0, 0, $this->new_width, $this->new_height,$this->width, $this->height); 
                switch($this->mime) { 
					case 'image/jpeg': 
						ImageJPEG($image_resized,$this->new_path); 
					break; 
					 
					case 'image/gif': 
						ImageGIF($image_resized,$this->new_path); 
					break; 
					 
					case 'image/png': 
						ImagePNG($image_resized,$this->new_path); 
					break; 
				} 
        } 
         
        //######### FUNCTION FOR RESETTING DEMENSIONS OF IMAGE ########### 
		function set_dimension() { 
			//echo $this->width.'<br>'.$this->max_width.'<br>';
			if ($this->width>0){
				$amount = $this->height * round($this->max_width / $this->width,2); 
			}else{
				$amount=$this->height;
			}
			//echo $amount;
			$this->new_height = $amount; 
			$this->new_width = $this->max_width; 
		} 
} 



?>