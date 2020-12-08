package com.company;

public class Main {

    // Własna wersja metody compareTo(String s)[uproszczona]
    public static int porownajDo(String oryginalny, String porownawczy)
    {

        int wartosc = 0;
        int dlugosc = 0;
        boolean oryginalDluzszy = false;
        if(oryginalny.length() > porownawczy.length())
        {
            dlugosc = porownawczy.length();
            oryginalDluzszy = true;
        }
        else
            dlugosc = oryginalny.length();

        if(oryginalny.equals(porownawczy))
            return 0;
        else

            for(int i=0; i<dlugosc; i++)
            {
                if(oryginalny.charAt(i) == porownawczy.charAt(i)){}
                else
                {
                    wartosc = (byte)oryginalny.charAt(i) - (byte)porownawczy.charAt(i);
                    break;
                }


            }

            if(wartosc > 0 || (wartosc == 0 && oryginalDluzszy))
                return 1;
            else
                return -1;
    }

    //Własna wersja metody endsWith(String s)
    public static boolean czyKonczySieZ(String oryginalny, String podlancuch)
    {
        boolean czyRowny = true;
        int dlugoscLancucha = podlancuch.length();
        int dlugoscOryginalu = oryginalny.length();
        // int i=dlugoscOryginalu-1; i > dlugoscOryginalu-dlugoscLancucha-1; i--
        for(int i = dlugoscOryginalu-dlugoscLancucha; i < dlugoscOryginalu; i++)
        {
            if(oryginalny.charAt(i) != podlancuch.charAt(i-(dlugoscOryginalu-dlugoscLancucha)))
            {
                czyRowny = false;
                break;
            }
        }
        return czyRowny;
    }

    //Własna wersja metody indexOf(String s)
    public static int numerWystepienia(String oryginal, String podlancuch)
    {
        int dlugoscLancucha = podlancuch.length();
        int dlugoscOryginalu = oryginal.length();
        int miejsceWystapienia = -1;

        for(int i = 0; i < dlugoscOryginalu - dlugoscLancucha + 1; i++)
        {
            if(oryginal.charAt(i) == podlancuch.charAt(0))
            {
                for(int j = 1; j < dlugoscLancucha; j++)
                {
                    if(oryginal.charAt(i+j) != podlancuch.charAt(j))
                    {
                        break;
                    }

                    if(j < dlugoscLancucha)
                        miejsceWystapienia = i;
                }
            }
        }
        return miejsceWystapienia;
    }

    //Własna wersja metody replace(char oldChar, char newChar)
    public static String zamien(String doZmiany, char staryChar, char nowyChar)
    {
        StringBuilder sb1 = new StringBuilder(doZmiany);
        for(int i=0; i<sb1.length(); i++)
        {
            if(sb1.charAt(i) == staryChar)
            {
                sb1.setCharAt(i, nowyChar);
            }
        }
        return String.valueOf(sb1);
    }

    //Własna wersja metody substring(int beginIndex)
    public static String zwrocPodLancuch(String oryginalny, int poczatek)
    {
        char[] nowyChar = new char[oryginalny.length()];
        for(int i = poczatek; i < oryginalny.length(); i++)
        {
            nowyChar[i-poczatek] = oryginalny.charAt(i);
        }

        return String.valueOf(nowyChar);
    }

    public static void main(String[] args) {

	    String s1 = "java jest dobra";
	    String s2 = "dobra";

	    //1
	    System.out.println(s1.compareTo(s2));
	    System.out.println(porownajDo(s1,s2));

	    //2
	    System.out.println(czyKonczySieZ(s1,s2));

	    //3
	    System.out.println(numerWystepienia(s1, s2));
	    System.out.println(s1.indexOf(s2));

	    //4
	    System.out.println(zamien(s1, ' ', '-'));

	    //5
	    System.out.println(zwrocPodLancuch(s1, 5));
    }
}
