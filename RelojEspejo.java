
import java.io.*;

public class RelojEspejo {

    public static void main(String[] args) throws IOException {

	BufferedReader br = new BufferedReader(new InputStreamReader(System.in));

	System.out.print("¿Cuántas horas vas a ingresar? ");
	int n = Integer.parseInt(br.readLine());

	for (int i = 0; i < n; i++) {

	    System.out.print("Ingrese la hora " + (i+1) + " (HH:MM): ");
	    String horaEspejo = br.readLine();

	    String[] partes = horaEspejo.split(":");

	    int h = Integer.parseInt(partes[0]);
	    int m = Integer.parseInt(partes[1]);

	    int totalMinutos = h * 60 + m;
	    int resultado = 720 - totalMinutos;

	    if (resultado <= 0) {
		resultado += 720;
	    }

	    int horaReal = resultado / 60;
	    int minutoReal = resultado % 60;

	    if (horaReal == 0) {
		horaReal = 12;
	    }

	    // Agregar cero manualmente (sin format)
	    String horaFinal;
	    String minutoFinal;

	    if (horaReal < 10) {
		horaFinal = "0" + horaReal;
	    } else {
		horaFinal = "" + horaReal;
	    }

	    if (minutoReal < 10) {
		minutoFinal = "0" + minutoReal;
	    } else {
		minutoFinal = "" + minutoReal;
	    }

	    System.out.println(horaEspejo + " -> " + horaFinal + ":" + minutoFinal);
	}
    }
}
