import { Module } from '@nestjs/common';
import { CategorieService } from './categorie.service';
import { CategorieController } from './categorie.controller';
import { MongooseModule } from '@nestjs/mongoose';
import { categorieSchema } from './categorie.schema';
import { categorieModelName } from './categorie.model-name';

@Module({
  imports: [MongooseModule.forFeature([{schema : categorieSchema, name : categorieModelName}])],
  controllers: [CategorieController],
  providers: [CategorieService]
})
export class CategorieModule {}
