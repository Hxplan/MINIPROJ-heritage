using System;
using System.Collections.Generic;
using System.Windows.Forms;
using MINIPROJ_heritage;

namespace MINIPROJ_heritage_TESTS
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Log(string s)
        {
            txtSortie.AppendText(s + Environment.NewLine);
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            #region test 1 : Instanciation et Collection

            var inventaire = new List<Arme>();
            inventaire.Add(new Arme(1, "Gourdin", 15, 3.0));
            inventaire.Add(new Epee(2, "Excalibur", 50, 2.5, 90.0, 25));
            inventaire.Add(new Epee(3, "Katana", 40, 1.5, 75.0, 35));

            #endregion

            #region test 2 : Boucle (polymorphisme)

            Log("=== 2. Boucle sur l'inventaire ===");
            foreach (Arme arme in inventaire)
                Log(arme + " -> Puissance calculée : " + arme.CalculerPuissance());

            #endregion

            #region test 3 : Exceptions (try / catch)

            Log("");
            Log("=== 3. Test des Exceptions (Try / Catch) ===");
            try
            {
                Epee epeeInvalide = new Epee(4, "Épée brisée", 10, 1.0, -50.0, 5);
                Log("Succès : " + epeeInvalide);
            }
            catch (Exception ex)
            {
                Log("Exception capturée avec succès : " + ex.Message);
            }

            #endregion
        }
    }
}
