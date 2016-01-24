import java.io.FileReader;
import java.io.BufferedReader;
import java.util.StringTokenizer;
import java.io.IOException;

public class Make_values {

    public static void main(String args[]) {

	if(args.length != 1){
	    System.out.println("Usage: java Make_sql <filename>");
	    System.exit(1);
	}
	
        try {
            //ファイルを読み込む
            FileReader fr = new FileReader(args[0]);
            BufferedReader br = new BufferedReader(fr);

            //読み込んだファイルを１行ずつ処理する
            String line;
            StringTokenizer token;
	    int num_of_token, count = 0;
	    int before_count = 0;
	    int line_ptr = 0;
	    System.out.print("values");
            while ((line = br.readLine()) != null) {
                //区切り文字","で分割する
                token = new StringTokenizer(line, ",");
		num_of_token = token.countTokens();

		System.out.print("(");
                //分割した文字を画面出力する
                while (token.hasMoreTokens()) {
                    System.out.print(token.nextToken());
		    count ++;
		    if(count != num_of_token)
			System.out.print(", ");
		}
		line_ptr++;
		System.out.println("),");		
		if(before_count != count && line_ptr != 1){
		    System.out.println("");
		    System.out.println(line_ptr + "行目の要素数が不正です。");
		    System.exit(-1);
		}
		before_count = count;
		count = 0;
            }
            //終了処理
            br.close();

        } catch (IOException ex) {
            //例外発生時処理
            ex.printStackTrace();
        }
    }

}
